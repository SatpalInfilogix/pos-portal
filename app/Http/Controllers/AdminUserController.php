<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminUserController extends Controller
{

    // Method to get admin user details
    public function getAdminUserDetail()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Return the authenticated user object
            return Auth::user();
        } else {
            // Return a response indicating the user is not authenticated
            return null;
        }
    }

    public function index()
    {
        $customerRole = Role::first();

        $users = User::whereDoesntHave('roles', function ($query) use ($customerRole) {
            $query->where('role_id', $customerRole->id);
        })->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function getUsers(Request $request)
    {
        $maxItemsPerPage = 10;

        $usersQuery = User::select(['id', 'first_name', 'last_name', 'email', 'phone_number'])
                        ->with('roles');

        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $usersQuery->where(function ($query) use ($searchValue) {
                $query->where('first_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('last_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
            });
        }

        if ($request->has('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumn]['data'];
            $usersQuery->orderBy($column, $orderDirection);
        }

        $totalRecords = $usersQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = $request->input('start', 0) / $perPage;
        $users = $usersQuery->skip($currentPage * $perPage)->take($perPage)->get();

        $users->transform(function ($user) {
            $roles = $user->roles->pluck('name')->implode(', ');
            $user->role = $roles;
            return $user;
        });

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $users
        ]);
    }



    public function create()
    {
        $roles = Role::latest()->get();

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'password'      => Hash::make('Admin@12345'),
        ])->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        $roles = Role::latest()->get();
        $user = User::where('id', $id)->first();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->update([
            'first_name'         => $request->first_name,
            'last_name'          => $request->last_name,
            'phone_number'       => $request->phone_number,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if ($user) {
            if ($user->status == 1) {
                $status = 0;
            } else{
                $status = 1;
            }
            $user->update([
                'status' => $status
            ]);
            return response()->json(['status' => 'success', 'user' => $status, 'message' => 'Category deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Category not found.'], 404);
        }
    }
}
