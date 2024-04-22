<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permissions = Permission::with('person')->get();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        $permissions = Permission::with('person')->get();
        return  view('permissions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
        ]);
        $permission = Permission::create($request->except('_token'));
        Toastr::success('Successfully Created', 'Success');


        return redirect()->to('permissions');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::all();
        $permission = Permission::find($id);
        return view('permissions.edit', compact('permission', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_id' => 'required',
        ]);
        $permission = Permission::find($id);

        $permission->update($request->all());

        return redirect()->to('permissions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->to('permissions');
    }
}
