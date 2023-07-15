<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDepartementsController;
use App\Http\Controllers\DashboardSuperadminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Auth;

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
    return view('Welcome');
});

Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('superadmin.dashboard');
// Rute-rute login disini
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {
    // Rute-rute admin di sini
});

Route::middleware(['auth', 'check.role:superadmin'])->prefix('superadmin')->group(function () {
    // Rute-rute superadmin di sini
    Route::get('/dashboard_superadmin', [DashboardSuperadminController::class, 'index'])->name('superadmin.dashboard');
    Route::prefix('dashboard_superadmin')->group(function () {
        // Rute-rute Departemen di sini
        Route::get('/departement', [DepartementController::class, 'index'])->name('superadmin.departement.index');
        Route::get('/departement/create', [DepartementController::class, 'create'])->name('superadmin.departement.create');
        Route::post('/departement', [DepartementController::class, 'store'])->name('superadmin.departement.store');
        Route::get('/departement/{departement}', [DepartementController::class, 'show'])->name('superadmin.departement.show');
        Route::get('/departement/{departement}/edit', [DepartementController::class, 'edit'])->name('superadmin.departement.edit');
        Route::put('/departement/{departement}', [DepartementController::class, 'update'])->name('superadmin.departement.update');
        Route::delete('/departement/{departement}', [DepartementController::class, 'destroy'])->name('superadmin.departement.destroy');
    });
    Route::prefix('dashboard_superadmin')->group(function () {
        // Rute-rute Admin Departemen di sini
        Route::get('/admin', [AdminDepartementsController::class, 'index'])->name('superadmin.admin.index');
        Route::get('/admin/create', [AdminDepartementsController::class, 'create'])->name('superadmin.admin.create');
        Route::post('/admin', [AdminDepartementsController::class, 'store'])->name('superadmin.admin.store');
        Route::get('/admin/{admin}', [AdminDepartementsController::class, 'show'])->name('superadmin.admin.show');
        Route::get('/admin/{admin}/edit', [AdminDepartementsController::class, 'edit'])->name('superadmin.admin.edit');
        Route::put('/admin/{admin}', [AdminDepartementsController::class, 'update'])->name('superadmin.admin.update');
        Route::delete('/admin/{admin}', [AdminDepartementsController::class, 'destroy'])->name('superadmin.admin.destroy');
    });
});


Route::middleware(['auth', 'check.role:user'])->prefix('user')->group(function () {
    // Rute-rute user di sini
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});
