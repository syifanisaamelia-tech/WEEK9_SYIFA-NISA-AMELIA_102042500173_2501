<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Halaman dashboard bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- ROUTE YANG DILINDUNGI MIDDLEWARE ROLE ---

// 1. Hanya Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', fn () => '<h1>Halaman Manajemen Pengguna (Admin Only)</h1>')->name('admin.users');
});

// 2. Admin dan Dosen (Kelola Materi & Nilai)
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/materi', fn () => '<h1>Halaman Kelola Materi (Admin & Dosen)</h1>')->name('materi');
    Route::get('/nilai', fn () => '<h1>Halaman Kelola Nilai (Admin & Dosen)</h1>')->name('nilai');
});

// 3. Mahasiswa (Lihat Materi)
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/materi', fn () => '<h1>Halaman Lihat Materi (Mahasiswa)</h1>')->name('mahasiswa.materi');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';