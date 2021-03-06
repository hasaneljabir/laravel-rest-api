<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'max:100',
            'password' => 'required'
        ]);

        $users = User::create($validation);

        return redirect('/users')->with('success', 'User added');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'max:100',
            'password' => 'required'
        ]);

        User::whereId($id)->update($validation);

        return redirect('/users')->with('success', 'User data updated');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('users')->with('danger', 'User deleted');
    }
}
