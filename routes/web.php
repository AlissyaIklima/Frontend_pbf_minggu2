<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController; 

Route::get('/', [LoginController::class, 'index'])->name('login.login');
Route::post('/', [LoginController::class, 'store'])->name('login.post');
Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Mahasiswa
Route::get('/mahasiswa/input', function () {
    return view('mahasiswa.input');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');


Route::get('/dosen/input', [DosenController::class, 'create'])->name('dosen.create'); // ubah ke controller
Route::get('/dosen/index', [DosenController::class, 'index'])->name('dosen.index'); // ubah ke controller
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');

// // Login routes
// Route::get('/', [LoginController::class, 'index'])->name('login.index');
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'store'])->name('login.post');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// // Dashboard route - UBAH DARI POST KE GET
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// // Mahasiswa routes
// Route::get('/mahasiswa/input', function () {
//     return view('mahasiswa.input');
// });

// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
// Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
// Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
// Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
// Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');

// // Dosen routes
// Route::get('/dosen/input', [DosenController::class, 'create'])->name('dosen.create');
// Route::get('/dosen/index', [DosenController::class, 'index'])->name('dosen.index');
// Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
// Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
// Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
// Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');