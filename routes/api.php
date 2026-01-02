<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KeuanganController;
use App\Http\Controllers\Api\InventarisController;
use App\Http\Controllers\Api\KolamController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\AdminUserController;
use App\Http\Controllers\Api\ProfileController; // Pastikan ini ada

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // --- FITUR PROFILE (UPDATE) ---
    // [BARU] Ini yang dibutuhkan agar edit profil bisa jalan
    Route::post('/profile', [ProfileController::class, 'update']);

    // --- FITUR DASHBOARD (STATISTIK & PIE CHART) ---
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // --- FITUR ADMIN (MANAJEMEN USER) ---
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::post('/admin/users/{id}/role', [AdminUserController::class, 'updateRole']);

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::post('/keuangan', [KeuanganController::class, 'store']);

    // Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index']);
    Route::post('/inventaris', [InventarisController::class, 'store']);

    // Kolam
    Route::get('/kolam', [KolamController::class, 'index']);
});