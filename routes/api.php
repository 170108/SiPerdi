<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Endpoint JSON sederhana untuk katalog dan peminjaman.
| Autentikasi memakai Basic Auth (email + password) untuk operasi tulis.
|
*/

Route::prefix('v1')->group(function () {
    // Publik: katalog buku
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{book}', [BookController::class, 'show']);

    // Basic Auth: siswa/admin
    Route::middleware('auth.basic')->group(function () {
        // Admin kelola buku
        Route::post('books', [BookController::class, 'store']);
        Route::match(['patch', 'put'], 'books/{book}', [BookController::class, 'update']);
        Route::delete('books/{book}', [BookController::class, 'destroy']);

        // Pinjaman siswa
        Route::get('me/loans', [LoanController::class, 'myLoans']);
        Route::post('loans', [LoanController::class, 'store']);

        // Data pengguna (admin only)
        Route::get('users', [UserController::class, 'index']);
        Route::get('users/{user}', [UserController::class, 'show']);
    });
});
