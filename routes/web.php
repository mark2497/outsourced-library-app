<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;

Route::get('/', function () {
    return redirect("/login");
});

Auth::routes();

/**
 * Routes for only authenticated users
 */
Route::middleware("auth")->group(function() {
    Route::get('/library', [HomeController::class, 'books'])->name('home');
    Route::prefix('books')->group(function() {
        Route::get('/details/{book}', [HistoryController::class, 'index']);
        Route::post('/borrow/{book}', [BookController::class, 'borrowBook']);
        Route::post('/return/{book}', [BookController::class, 'returnBook']);
    });
});

