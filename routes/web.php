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
