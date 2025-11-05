<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    return redirect()->route('dashboard');
})->name('login.process');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/keuangan', function () {
    return view('keuangan');
});

Route::get('/data_kolam', function () {
    return view('data_kolam');
});

Route::get('/inventaris', function () {
    return view('inventaris');
});

Route::get('/keuangan/list', function () {
    return view('keuangan.list');
})->name('keuangan.list');

Route::view('/keuangan/detail', 'keuangan.detail')->name('keuangan.detail');

Route::get('/inventaris/detail', function () {
    return view('inventaris.detail');
})->name('inventaris.detail');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
