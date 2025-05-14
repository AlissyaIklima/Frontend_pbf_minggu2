<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/iframe/buttons', function () {
    return view('components.buttons');
});

Route::get('/mahasiswa/input', function () {
    return view('mahasiswa.input');
});
Route::get('/mahasiswa/index', function () {
    return view('mahasiswa.index');
});

Route::get('/dosen/input', function () {
    return view('dosen.input');
});
Route::get('/dosen/index', function () {
    return view('dosen.index');
});