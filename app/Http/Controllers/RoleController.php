<?php

namespace App\Http\Controllers;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $roles = Role::orderBy('role_name')->paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('roles.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
            'user_id' => 'required|numeric',
        ]);
        
        Role::create($request->post());

        return redirect()->route('roles.index')->with('status','Role has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Role  $Role
    * @return \Illuminate\Http\Response
    */
    public function show(Role $role)
    {
        return view('roles.show',compact('role'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Role  $Role
    * @return \Illuminate\Http\Response
    */
    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\role  $role
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => 'required',
            'user_id' => 'required|numeric',
        ]);
        
        $role->fill($request->post())->save();

        return redirect()->route('roles.index')->with('status','Role Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Role  $role
    * @return \Illuminate\Http\Response
    */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('status','Role has been deleted successfully');
    }
}