<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Store;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

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
        if (!Gate::allows('view users')) {
            abort(403);
        }
        $stores = Store::where('is_deleted',0)->get();
        return view('admin.users.index',compact('stores'));
    }

    public function getUsers(Request $request)
    {
        $maxItemsPerPage = 10;

        $usersQuery = User::select(['id', 'first_name', 'last_name', 'email', 'status', 'phone_number'])
            ->whereDoesntHave('roles', function ($query) {
                $query->where('role_id', 1);
            })
            ->with('roles');
        if($request->store_id){
            $usersQuery->where('store_id',$request->store_id);
        }

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
        if (!Gate::allows('create users')) {
            abort(403);
        }

        $roles = Role::latest()->get();
        $stores = Store::where('is_deleted', 0)->get();

        return view('admin.users.create', compact('roles', 'stores'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'store_id'      => $request->store_id,
            'password'      => Hash::make($request->password),
        ])->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        if (!Gate::allows('edit users')) {
            abort(403);
        }

        $roles = Role::latest()->get();
        $user = User::where('id', $id)->first();
        $stores = Store::where('is_deleted', 0)->get();
        return view('admin.users.edit', compact('user', 'roles', 'stores'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->update([
            'first_name'         => $request->first_name,
            'last_name'          => $request->last_name,
            'phone_number'       => $request->phone_number,
            'store_id'           => $request->store_id
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete users')) {
            abort(403);
        }

        $user = User::where('id', $id)->first();

        if ($user) {
            if ($user->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            $user->update([
                'status' => $status
            ]);
            return response()->json(['status' => 'success', 'user' => $status, 'message' => 'User deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not found.'], 404);
        }
    }

    public function userActivity()
    {
        $users = User::latest()
                ->whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'super admin');
                })->get();

        $userActivity = UserActivity::latest()->get();

        return view('admin.users.users-activity',compact('users', 'userActivity'));
    }

    public function getUsersActivity(Request $request)
    {
        $usersQuery = UserActivity::select([
                'users_activities.id',
                'users_activities.logged_in',
                'users_activities.logged_out',
                'users.first_name',
                'users.last_name'
            ])
            ->join('users', 'users_activities.user_id', '=', 'users.id'); // Adjust the join condition as necessary

        $usersQuery->whereDoesntHave('user.roles', function ($query) {
            $query->where('name', 'super admin');
        });

        $store_id = Auth::user()->store_id;
        if($store_id){
            $usersQuery->where('users.store_id',$store_id);
        }    

        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $usersQuery->where(function ($query) use ($searchValue) {
                $query->where('users.first_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('users.last_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('users_activities.logged_in', 'like', '%' . $searchValue . '%')
                    ->orWhere('users_activities.logged_out', 'like', '%' . $searchValue . '%');
            });
        }

        if ($request->has('date') && !empty($request->date)) {
            $date = $request->date;
            $usersQuery->where(function ($query) use ($date) {
                $query->whereDate('users_activities.logged_in', $date)
                    ->orWhereDate('users_activities.logged_out', $date);
            });
        }

        if ($request->has('user_id') && !empty($request->user_id)) {
            $user_id = $request->user_id;
            $usersQuery->where('users_activities.user_id', $user_id);
        }

        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $columns = $request->columns;
            $column = $columns[$orderColumnIndex]['data'];

            if ($column === 'first_name') {
                $usersQuery->orderBy('users.first_name', $orderDirection);
            } elseif ($column === 'last_name') {
                $usersQuery->orderBy('users.last_name', $orderDirection);
            } elseif (in_array($column, ['id', 'logged_in', 'logged_out'])) {
                $usersQuery->orderBy('users_activities.' . $column, $orderDirection);
            }
        }

        $totalRecords = $usersQuery->count();

        $perPage = $request->input('length', 10);
        $currentPage = $request->input('start', 0) / $perPage;
        $users = $usersQuery->skip($currentPage * $perPage)->take($perPage)->get();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $users
        ]);
    }

    

}
