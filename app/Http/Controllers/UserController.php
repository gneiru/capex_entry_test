<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','asc')->paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);
        User::create($request->post());

        return redirect()->route('users.index')->with('status','User has been created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));


    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('status','User Has Been updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status','User has been deleted successfully');
    }
}