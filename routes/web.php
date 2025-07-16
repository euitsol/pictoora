<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\BooksPageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomePageController::class)->name('home.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BooksPageController::class)->name('books.')->group(function () {
    Route::get('/books', 'index')->name('index');
});

