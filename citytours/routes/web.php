<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TransferServiceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DiscoverController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\TripController;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::controller(HomeController::class)->group(function () {
    Route::get('', 'show')->name('home');
});

Route::controller(LoginController::class)->group(function () {
    Route::post('login', 'login')->name('login');

    Route::get('google/redirect', 'redirectToGoogle')->name('login.google');
    Route::get('google/callback', 'handleGoogleCallback')->name('callback.google');

    Route::get('logout', 'logout')->name('logout');
});

Route::controller(PasswordController::class)->group(function () {
   Route::post('forgot', 'forgot')->name('password.forgot');
   Route::get('reset', 'viewResetPage')->name('password.reset.view');
   Route::post('reset', 'reset')->name('password.reset');
});

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register')->name('register');
});

Route::controller(DiscoverController::class)->group(function () {
    Route::get('discover', 'showAll')->name('discover');
    Route::get('place', 'show')->name('discover.place');
});

Route::controller(HotelController::class)->group(function () {
    Route::get('hotels', 'showAll')->name('hotel');
    Route::get('hotel/{place}', 'show')->name('hotel.place');
});

Route::controller(RestaurantController::class)->group(function () {
    Route::get('restaurants', 'showAll')->name('restaurant');
    Route::get('restaurant/{place}', 'show')->name('restaurant.place');
});

Route::controller(BarController::class)->group(function () {
    Route::get('bars', 'showAll')->name('bar');
    Route::get('bar/{place}', 'show')->name('bar.place');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'showAll')->name('blog');
    Route::get('blog/post', 'showPost')->name('blog.post');
});

Route::controller(TripController::class)->group(function () {
    Route::get('trip', 'show')->name('trip');
    Route::get('travel', 'getDirection')->name('travel');
});

Route::controller(TransferServiceController::class)->group(function () {
    Route::get('transfers', 'showAll')->name('transfers');
    Route::get('transfers/service', 'showService')->name('transfers.service');
    Route::post('transfers/service', 'bookService')->name('transfers.service.book');
    Route::get('transfers/cart', 'showCart')->name('transfers.cart');
    Route::get('transfers/cart/delete', 'deleteCart')->name('transfers.cart.delete');
    Route::get('transfers/booking/payment', 'showPayment')->name('transfers.booking.payment');
    Route::post('transfers/booking/payment', 'makePayment')->name('transfers.booking.payment.make');
    Route::get('transfers/booking/complete', 'showCompletedBooking')->name('transfers.booking.complete');
});

Route::controller(LanguageController::class)->group(function () {
    Route::get('locale/{locale}', 'change')->name('locale');
});

Route::controller(InvoiceController::class)->group(function () {
    Route::get('invoice/transfer', 'showTransferInvoice')->name('invoice.transfer');
});
