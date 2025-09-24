<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\BooksPageController;
use App\Http\Controllers\Frontend\BookDetailsPageController;
use App\Http\Controllers\Frontend\PersonalizePageController;
use App\Http\Controllers\Frontend\PreviewPageController;
use App\Http\Controllers\Frontend\CheckoutPageController;

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

Route::controller(PreviewPageController::class)->name('preview.')->group(function () {
    Route::get('/preview/{slug?}', 'index')->name('index');
});

Route::controller(CheckoutPageController::class)->name('checkout.')->group(function () {
    Route::get('/checkout/{slug?}', 'index')->name('index');
});



// common page frontend
Route::get('/about', [aboutController::class, 'index']);
Route::get('/contact', [contact_us_controller::class, 'index']);
Route::get('/faq', [faq_controller::class, 'index']);
Route::get('/policy', [policy_controller::class, 'index']);

