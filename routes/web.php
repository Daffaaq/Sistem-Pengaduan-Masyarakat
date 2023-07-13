<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('superadmin.layouts.master');
});

// Rute-rute login disini
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {
    // Rute-rute admin di sini
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'check.role:superadmin'])->prefix('superadmin')->group(function () {
    // Rute-rute superadmin di sini
    Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');
});


Route::middleware(['auth', 'check.role:user'])->prefix('user')->group(function () {
    // Rute-rute user di sini
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});