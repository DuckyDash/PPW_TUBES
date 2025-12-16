<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KolamController;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('data_kolam', KolamController::class)->except(['show', 'create', 'edit']);
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');


    Route::middleware('role:admin')->group(function () {

        Route::get('/keuangan', function () {
            return view('keuangan');
        });
        Route::get('/keuangan/list', function () {
            return view('keuangan.list');
        })->name('keuangan.list');
        Route::view('/keuangan/detail', 'keuangan.detail')->name('keuangan.detail');

        Route::get('/inventaris', function () {
            return view('inventaris');
        });
        Route::get('/inventaris/detail', function () {
            return view('inventaris.detail');
        })->name('inventaris.detail');


        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::post('/users/{id}/make-admin', [AdminUserController::class, 'makeAdmin'])->name('admin.makeAdmin');
        Route::post('/users/{id}/make-user', [AdminUserController::class, 'makeUser'])->name('admin.makeUser');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

        Route::get('/list-kolam', [KolamController::class, 'adminIndex'])->name('admin.kolam.index');

        Route::delete('/list-kolam/{id}', [KolamController::class, 'destroy'])->name('admin.kolam.destroy');
    });
});
