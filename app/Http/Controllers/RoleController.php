<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole:ADMIN');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $role = Role::all();
        return view('pages.admin.roles.list')->with('role', $role);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'name' => 'required',

        ]);
        Role::create($request->all());
        return redirect()->route('roles.index')
            ->with('status', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
        return view('pages.admin.roles.create')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //

        $request->validate([
            'name' => 'required',

        ]);
        $role->update($request->all());
        return redirect()->route('roles.index')
            ->with('status', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')
            ->with('status', 'Role Deleted successfully.');
    }
}
