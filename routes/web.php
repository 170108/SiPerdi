<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\SiswaAuthController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\PinjamController;
use Illuminate\Support\Facades\Route;

// -----------------------------
// AUTH ROUTES
// -----------------------------
// Siswa login/register (tidak ada opsi admin di sini)
Route::controller(SiswaAuthController::class)
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', 'showLogin')->name('login');
            Route::post('login', 'login')->name('login.submit');
            Route::get('register', 'showRegister')->name('register');
            Route::post('register', 'register')->name('register.submit');
        });
        Route::post('logout', 'logout')->middleware('auth')->name('logout');
    });

// Admin login hanya di area admin
Route::controller(AdminAuthController::class)
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', 'showLogin')->name('login');
            Route::post('login', 'login')->name('login.submit');
        });
        Route::post('logout', 'logout')->middleware('auth')->name('logout');
    });

// -----------------------------
// SISWA AREA (proteksi role siswa)
// -----------------------------
Route::middleware(['auth', 'is_siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
        Route::get('pinjam', [PinjamController::class, 'index'])->name('pinjam');
        Route::post('pinjam', [PinjamController::class, 'store'])->name('pinjam.store');
    });

// -----------------------------
// ADMIN AREA (proteksi role admin)
// -----------------------------
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('books', BookController::class)->except(['show']);
    });

// -----------------------------
// LANDING: arahkan ke login siswa
// -----------------------------
Route::redirect('/', '/siswa/login');
