<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user', // Assuming roles are limited to admin and user
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded image
        ]);

        // Handle image upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('profile_img', 'my_storage');
            // $validatedData['avatar_url'] = Storage::disk('my_storage')->url($avatarPath);
            // $validatedData['avatar_url'] = url(Storage::url($avatarPath));
            $validatedData['avatar_url'] = url(Storage::disk('my_storage')->url($avatarPath));

        }

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,user', // Assuming roles are limited to admin and user
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded image
        ]);

        // Handle image upload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('profile_img', 'my_storage');
            // $validatedData['avatar_url'] = Storage::disk('my_storage')->url($avatarPath);
            // $validatedData['avatar_url'] = url(Storage::url($avatarPath));
            $validatedData['avatar_url'] = url(Storage::disk('my_storage')->url($avatarPath));

        }



        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.show', compact('user'));
    }
}
