<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view('Users.index', [
            "pagetitle" => 'User Profile',
            "maintitle" => 'User Profile',
        ], compact('users'));
    }

    public function create()
    {
        return view('Users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return redirect()->route('Users.index')->with('success', 'User created successfully');
    }

    public function show()
    {
        return view('Users.index', compact('user'));
    }

    public function edit(User $user)
    {
        return view('Users.edit', [
            "pagetitle" => 'Edit Profile',
            "maintitle" => 'Edit Profile',
        ], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
        ];
    
        // Conditionally update the password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
    
        $user->update($data);
    
        return redirect()->route('welcome')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('welcome')->with('success', 'User deleted successfully');
    }
}