<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\BooksPageController;
use App\Http\Controllers\Frontend\BookDetailsPageController;
use App\Http\Controllers\Frontend\PersonalizePageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(HomePageController::class)->name('home.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(BooksPageController::class)->name('books.')->group(function () {
    Route::get('/books', 'index')->name('index');
});

Route::controller(BookDetailsPageController::class)->name('book-details.')->group(function () {
    Route::get('/book-details/{slug?}', 'index')->name('index');
});


Route::controller(PersonalizePageController::class)->name('personalize.')->group(function () {
    Route::get('/personalize/{slug?}', 'index')->name('index');
});
