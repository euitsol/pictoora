<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\PolicyController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\BooksPageController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\FailedPageController;
use App\Http\Controllers\Frontend\PreviewPageController;
use App\Http\Controllers\Frontend\SuccessPageController;
use App\Http\Controllers\Frontend\CheckoutPageController;
use App\Http\Controllers\Frontend\BookDetailsPageController;
use App\Http\Controllers\Frontend\PersonalizePageController;
use App\Http\Controllers\Frontend\PaymentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    return "Optimize cleared";
});

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
    Route::get('/checkout', 'index')->name('index');
});

Route::controller(PaymentController::class)->name('payment.')->prefix('payment')->group(function () {
    Route::post('/stripe', 'stripeInit')->name('stripe');
});

Route::controller(AboutPageController::class)->name('about.')->group(function () {
    Route::get('/about', 'index')->name('index');
});
Route::controller(ContactUsController::class)->name('contact.')->group(function () {
    Route::get('/contact', 'index')->name('index');
});
Route::controller(FaqController::class)->name('faq.')->group(function () {
    Route::get('/frequently-asked-questions', 'index')->name('index');
});
Route::controller(PolicyController::class)->name('policy.')->group(function () {
    Route::get('/policy', 'index')->name('index');
});
Route::controller(SuccessPageController::class)->name('success.')->group(function () {
    Route::get('/success', 'index')->name('index');
});
Route::controller(FailedPageController::class)->name('failed.')->group(function () {
    Route::get('/failed', 'index')->name('index');
});




