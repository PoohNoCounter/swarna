<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $roles = [
            [
                'id' => 'admin',
                'name' => 'Admin',
            ],
            [
                'id' => 'user',
                'name' => 'User',
            ]
        ];
        $users = User::all();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email',
                'no_hp' => 'required',
                'location' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'location' => $request->location,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('alert', 'Success Create User!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'no_hp' => 'required',
                'location' => 'required',
                'role' => 'required'
            ]
        );

        $user = User::where('id', $id)->first();
        $user->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'location' => $request->location,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]
        );
        return back()->with('alert', 'Success Edit User!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('alert', 'Success Delete User!');
    }
}
