<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('person')->get();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $permissions = Permission::all();
        $roles = Role::all();
        return  view('roles.create', compact('users', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
        ]);

        // Extract data from the request
        $data = $request->only(['name', 'user_id', 'permission_ids']);


        // Serialize permissions
        $permissions = json_encode($data['permission_ids']);

        // Create the role
        $role = Role::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'permissions' => $permissions
        ]);

        return redirect()->to('roles');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::findOrFail($id);
        $decoded_perms = json_decode($role->permissions) ?? [];
        $permissions = Permission::whereIn('id', $decoded_perms)->get();

        return view('roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $permissions = Permission::all();
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role', 'users', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
        ]);

        // Extract data from the request
        $data = $request->only(['name', 'user_id', 'permission_ids']);

        // Serialize permissions
        $permissions = json_encode($data['permission_ids']);

        // Find the role by ID
        $role = Role::findOrFail($id);

        // Update the role with new data
        $role->update([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            'permissions' => $permissions
        ]);

        // Redirect to the roles page
        return redirect()->to('roles');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->to('roles');
    }
}
