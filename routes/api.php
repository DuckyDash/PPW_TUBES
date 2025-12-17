<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KeuanganController;
use App\Http\Controllers\Api\InventarisController;
use App\Http\Controllers\Api\KolamController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Keuangan
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::post('/keuangan', [KeuanganController::class, 'store']);

    // Inventaris
    Route::get('/inventaris', [InventarisController::class, 'index']);
    Route::post('/inventaris', [InventarisController::class, 'store']);

    // Kolam
    Route::get('/kolam', [KolamController::class, 'index']);
});
