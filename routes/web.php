<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // Home / Landing Page
})->name('home');

Route::get('/belajar', function () {
    return view('belajar'); // Pastikan file ini ada di resources/views/
})->name('belajartbc');

Route::get('/monitor', function () {
    return view('monitor');
})->name('monitortbc');

Route::get('/map', function () {
    return view('map');
})->name('cariklinik');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| Auth Required Routes (Hanya setelah login)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect('/'); // Biar gak stay di dashboard bawaan Laravel
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
