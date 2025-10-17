<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ✅ HOME – semua boleh
Route::get('/', function () {
    return view('welcome'); // nanti kamu pastikan file nya home.blade.php
})->name('home');

// ✅ BELAJAR TBC – semua boleh
Route::get('/belajar', function () {
    return view('belajar'); // belajar.blade.php
})->name('belajar');

// ✅ MONITOR – semua boleh, tapi nanti beda konten di blade berdasarkan @auth
Route::get('/monitor', function () {
    return view('monitor'); // monitor.blade.php
})->name('monitor');

// ✅ MAP – semua boleh
Route::get('/map', function () {
    return view('map'); // map.blade.php
})->name('map');

// ✅ ABOUT – semua boleh
Route::get('/about', function () {
    return view('about'); // about.blade.php
})->name('about');

// ✅ Dashboard – khusus user (sudah ada default dari Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Profile – default breeze, sudah aman
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

