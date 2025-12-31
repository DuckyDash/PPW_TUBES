<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USERS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    //Route::get('/dashboard', fn () => view('dashboard'))
    //    ->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | DATA KOLAM
    |--------------------------------------------------------------------------
    */
    Route::resource('data_kolam', KolamController::class)
        ->except(['show', 'create', 'edit']);

    /*
    |--------------------------------------------------------------------------
    | KEUANGAN
    |--------------------------------------------------------------------------
    */
    Route::get('/keuangan', [KeuanganController::class, 'index'])
        ->name('keuangan.index');

    Route::post('/keuangan', [KeuanganController::class, 'store'])
        ->name('keuangan.store');

    Route::get('/keuangan/{id}', [KeuanganController::class, 'show'])
        ->name('keuangan.detail');

    Route::get('/keuangan/list', fn() => view('keuangan.list'))
        ->name('keuangan.list');

    /*
    |--------------------------------------------------------------------------
    | INVENTARIS 
    |--------------------------------------------------------------------------
    */
    Route::get('/inventaris', [InventarisController::class, 'index'])
        ->name('inventaris.index');

    Route::post('/inventaris', [InventarisController::class, 'store'])
        ->name('inventaris.store');

    Route::get('/inventaris/{id}', [InventarisController::class, 'show'])
        ->name('inventaris.detail');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])
        ->name('inventaris.update');


    Route::post('/panen', [PanenController::class, 'store'])->name('panen.store');
    Route::get('/riwayat-panen', [PanenController::class, 'userIndex'])->name('panen.user');

    // Admin Routes (Masukkan dalam group admin prefix)
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/panen', [PanenController::class, 'adminIndex'])->name('panen.admin');
        Route::put('/panen/{id}/verify', [PanenController::class, 'verify'])->name('panen.verify');
        Route::put('/panen/{id}/sold', [PanenController::class, 'markAsSold'])->name('panen.sold');
    });


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', fn() => view('profile'))
        ->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('admin.users');

        Route::post('/users/{id}/make-admin', [AdminUserController::class, 'makeAdmin'])
            ->name('admin.makeAdmin');

        Route::post('/users/{id}/make-user', [AdminUserController::class, 'makeUser'])
            ->name('admin.makeUser');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN KOLAM
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {

        Route::get('/list-kolam', [KolamController::class, 'adminIndex'])
            ->name('admin.kolam.index');

        Route::delete('/list-kolam/{id}', [KolamController::class, 'destroy'])
            ->name('admin.kolam.destroy');
    });
});
