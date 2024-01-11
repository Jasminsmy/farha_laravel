<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|string',
        // Add more validation rules as needed
        ]);

        // Hash the password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.profile', compact('user'));
    }

    public function editPassword(User $user)
    {
        return view('users.editpassword', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile', ['user' => $user])->with('success', 'Password updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
