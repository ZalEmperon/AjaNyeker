<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua user
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
        ]);

        // Temukan user berdasarkan id
        $user = User::findOrFail($id);

        // Update user
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        // Hapus user
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
}