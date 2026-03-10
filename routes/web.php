<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SiswaAuthController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\PinjamController;
use Illuminate\Support\Facades\Route;

// Landing diarahkan ke login siswa
Route::redirect('/', '/siswa/login');

// Lupa password (umum untuk admin/siswa)
Route::middleware('guest')->group(function () {
    Route::get('password/forgot', [ResetPasswordController::class, 'create'])->name('password.request');
    Route::post('password/email', [ResetPasswordController::class, 'store'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'edit'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'update'])->name('password.update');
});

// =========================
// AUTH SISWA
// =========================
Route::prefix('siswa')
    ->name('siswa.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', [SiswaAuthController::class, 'showLogin'])->name('login');
            Route::post('login', [SiswaAuthController::class, 'login'])->name('login.submit');
            Route::get('register', [SiswaAuthController::class, 'showRegister'])->name('register');
            Route::post('register', [SiswaAuthController::class, 'register'])->name('register.submit');
        });

        Route::post('logout', [SiswaAuthController::class, 'logout'])->name('logout');

        Route::middleware(['auth', 'is_siswa'])->group(function () {
            Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard');
            Route::get('pinjam', [PinjamController::class, 'index'])->name('pinjam');
            Route::post('pinjam', [PinjamController::class, 'store'])->name('pinjam.store');
        });
    });

// =========================
// AUTH ADMIN
// =========================
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
            Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
        });

        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::middleware(['auth', 'is_admin'])->group(function () {
            Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
            Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
            Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
            Route::resource('books', BookController::class)->except(['show']);
            Route::get('students/pending', [AdminStudentController::class, 'pending'])->name('students.pending');
            Route::post('students/{user}/approve', [AdminStudentController::class, 'approve'])->name('students.approve');
            Route::delete('students/{user}', [AdminStudentController::class, 'reject'])->name('students.reject');
        });
    });
