<?php

namespace App\Http\Controllers\Api; // <--- Perhatikan Namespace ada 'Api'

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Import Rule

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            // Validasi email harus unique kecuali punya user ini sendiri
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'password' => 'nullable|min:6'
        ]);

        // Ambil data yang mau diupdate
        $data = $request->only(['name', 'email', 'phone', 'address']);

        // Jika password diisi, hash password baru
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Update Database
        $user->update($data);

        // BALIKAN JSON (PENTING!)
        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui.',
            'data' => $user
        ]);
    }
}