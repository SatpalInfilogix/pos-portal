<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        if(!Gate::allows('view roles & permissions')) {
            abort(403);
        }

        $roles = Role::where('name', '!=', 'Super Admin')->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        if(!Gate::allows('create roles & permissions')) {
            abort(403);
        }

        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        if(!Gate::allows('create roles & permissions')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        Role::create([
            'name' => $request->name
        ]);
        
        return redirect()->route('roles.index')->with('success', 'Role saved successfully'); 
    }

    public function edit(Role $role)
    {
        if(!Gate::allows('edit roles & permissions')) {
            abort(403);
        }

        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        if(!Gate::allows('edit roles & permissions')) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        Role::where('id', $role->id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully'); 
    }

    public function destroy(Role $role)
    {
        if(!Gate::allows('delete roles & permissions')) {
            abort(403);
        }

        Role::where('id', $role->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully.'
        ]);
    }
}
