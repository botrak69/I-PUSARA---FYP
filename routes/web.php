<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BorangController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// ==========================
// 🔗 Main Frontend Pages
// ==========================

Route::view('/', 'Frontend.utama')->name('utama');
Route::view('/profil', 'Frontend.profil')->name('profil');
Route::view('/berita', 'Frontend.berita')->name('berita');
Route::view('/borang', 'Frontend.borang')->name('borang');
Route::view('/nota', 'Frontend.nota')->name('nota');
Route::view('/hubungi', 'Frontend.hubungi')->name('hubungi');
Route::view('/mengenai', 'Frontend.mengenai')->name('mengenai');
Route::view('/lokasi', 'Frontend.lokasi')->name('lokasi');
Route::view('/map', 'Frontend.map')->name('map');

// ==========================
// 🔑 Authentication
// ==========================

Route::view('/login', 'Frontend.profil')->name('login.page');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// 📝 Form Submission
// ==========================

Route::post('/submit-borang', [ApplicationController::class, 'store'])->name('submit.borang');
Route::post('/borang/submit', [BorangController::class, 'submit'])->name('submit.borang');

// ==========================
// 🏛️ Dashboard & Admin CRUD (Protected)
// ==========================

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::post('/dashboard/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::get('/dashboard/delete/{id}', [DashboardController::class, 'delete'])->name('dashboard.delete');
    Route::get('/overview', [DashboardController::class, 'overview'])->name('overview');


    Route::get('/approval', [AdminController::class, 'approval'])->name('approval');
    Route::get('/approval/accept/{id}', [AdminController::class, 'accept'])->name('approval.accept');
    Route::get('/approval/reject/{id}', [AdminController::class, 'reject'])->name('approval.reject');


// ==========================
// 🏛️ Form Approval, Accept. and Reject
// ==========================

Route::get('/approval', [BorangController::class, 'approval'])->name('approval');
Route::get('/approval/accept/{id}', [BorangController::class, 'accept'])->name('approval.accept');
Route::get('/approval/reject/{id}', [BorangController::class, 'reject'])->name('approval.reject');

    
});
