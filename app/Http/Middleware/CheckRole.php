<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    // public function handle(Request $request, Closure $next, $role)
    // {
    //     // Jika belum login, lempar ke login
    //     if (!Auth::check()) {
    //         return redirect('login');
    //     }

    //     // Cek role user saat ini
    //     $userRole = Auth::user()->role;

    //     // Jika role user sesuai dengan yang diminta (misal: admin), silakan lewat
    //     if ($userRole == $role) {
    //         return $next($request);
    //     }

    //     // Jika User biasa mencoba akses halaman Admin, tampilkan error 403 atau redirect
    //     abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    // }
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user(); // sanctum-safe

        // Belum login / token invalid
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        // Role tidak sesuai
        if ($user->role !== $role) {
            return response()->json([
                'message' => 'Forbidden - role not allowed'
            ], 403);
        }

        return $next($request);
    }
}