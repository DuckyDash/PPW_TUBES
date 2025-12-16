<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();

        return back()->with('success', 'User berhasil dijadikan Admin!');
    }

    public function makeUser($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'user';
        $user->save();

        return back()->with('success', 'Admin berhasil diubah menjadi User biasa.');
    }
}