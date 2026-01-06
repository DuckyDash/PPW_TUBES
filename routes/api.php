<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KeuanganController;
use App\Http\Controllers\Api\InventarisController;
use App\Http\Controllers\Api\KolamController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AdminUserController;
use App\Http\Controllers\Api\ProfileController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATED (USER & ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Profile
    Route::post('/profile', [ProfileController::class, 'update']);

    // Dashboard (user & admin)
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Kolam (user lihat milik sendiri, admin lihat semua)
    Route::get('/kolam', [KolamController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        // Keuangan
        Route::get('/keuangan', [KeuanganController::class, 'index']);
        Route::post('/keuangan', [KeuanganController::class, 'store']);

        // Inventaris
        Route::get('/inventaris', [InventarisController::class, 'index']);
        Route::post('/inventaris', [InventarisController::class, 'store']);

        // Manajemen User
        Route::get('/admin/users', [AdminUserController::class, 'index']);
        Route::post('/admin/users/{id}/role', [AdminUserController::class, 'updateRole']);
    });
});
