<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDepartementsController;
use App\Http\Controllers\AnswerComplaintfromAdminController;
use App\Http\Controllers\ComplaintSuperadminController;
use App\Http\Controllers\DashboardSuperadminController;
use App\Http\Controllers\ComplaintsToAdminController;
use App\Http\Controllers\ComplaintsFromUserController;
use App\Http\Controllers\AnsweComplaintstoUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LandingPageController;
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

// Route::get('/', function () {
//     return view('masyarakat.layouts_baru.index');
// });

// route buat landingpage
Route::group(['prefix' => '/'], function () {
    Route::get('/', [LandingPageController::class, 'indexberanda'])->name('beranda');
    Route::post('/poll/like/{id}', [LandingPageController::class, 'likePoll'])->name('poll.like');
    Route::post('/poll/dislike/{id}', [LandingPageController::class, 'dislikePoll'])->name('poll.dislike');
    Route::post('/track-complaint', [LandingPageController::class, 'trackComplaint'])->name('track.complaint');
    Route::get('/api/departements/{id}', [LandingPageController::class, 'show']);



    Route::get('/tentang', [LandingPageController::class, 'indexTentang'])->name('tentang');
    Route::get('/statistik', [LandingPageController::class, 'indexStatik'])->name('statistik');
    // Tambahkan route lainnya di sini jika ada
});

Auth::routes();

// Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@register')->name('register');

// Route::get('/home', [HomeController::class, 'index'])->name('superadmin.dashboard');
// Rute-rute login disini
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// route buat admin
Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {
    // Rute-rute admin di sini
    Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix('dashboard_admin')->group(function () {
        // Rute-rute Departemen di sini
        Route::get('/complaints', [ComplaintsToAdminController::class, 'index'])->name('admin.complaints.index');
        Route::get('/complaints/{complaint}/answer/create', [AnswerComplaintfromAdminController::class, 'create'])->name('admin.complaints.answer.create');
        Route::put('/complaints/{complaint}/status/update', [ComplaintsToAdminController::class, 'updateStatus'])->name('admin.complaints.status.update');
        Route::get('/complaints/{id}/detail', [ComplaintsToAdminController::class, 'showDetailAjax'])->name('admin.complaints.detail.ajax');
        Route::post('/complaints/{complaint}/answer/store', [AnswerComplaintfromAdminController::class, 'store'])->name('admin.complaints.answer.store');
        Route::get('/answercomplaints', [AnswerComplaintfromAdminController::class, 'index'])->name('admin.answercomplaints.index');
    });
});

// route buat superadmin
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
        Route::post('/import-departements', [DepartementController::class, 'import'])->name('superadmin.departement.import');
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
    Route::prefix('dashboard_superadmin')->group(function () {
        // Rute-rute Admin Departemen di sini
        Route::get('/complaints', [ComplaintSuperadminController::class, 'index'])->name('superadmin.complaints.index');
        Route::get('/superadmin/dashboard_superadmin/complaints/cetak_pdf', [ComplaintSuperadminController::class, 'cetak_pdf'])->name('superadmin.complaints.cetak_pdf');
    });
});

// route buat user
Route::middleware(['auth', 'check.role:user'])->prefix('user')->group(function () {
    // Rute-rute user di sini
    Route::get('/user', [DashboardUserController::class, 'index'])->name('user.dashboard');
    Route::prefix('user')->group(function () {
        Route::get('/complaints', [ComplaintsFromUserController::class, 'index'])->name('user.complaints.index');
        Route::get('/complaints/create', [ComplaintsFromUserController::class, 'create'])->name('user.complaints.create');
        Route::post('/complaints', [ComplaintsFromUserController::class, 'store'])->name('user.complaints.store');
        Route::get('/show/{id}', [ComplaintsFromUserController::class, 'show'])->name('user.complaints.show');
        Route::get('/complaints/{id}/details', [ComplaintsFromUserController::class, 'details'])->name('complaints.details');
    });
    Route::prefix('user')->group(function () {
        Route::get('/answer_complaints', [AnsweComplaintstoUserController::class, 'index'])->name('user.answercomplaints.index');
    });
    Route::prefix('user')->group(function () {
        Route::get('/profiles/edit', [UserController::class, 'edit'])->name('user.profiles.edit');
        Route::put('/profiles/{id}', [UserController::class, 'update'])->name('user.profiles.update'); // Perbaiki nama rute menjadi 'user.profiles.update'
    });
});
