<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\DiscoverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'view')->name('login.view');
    Route::post('login', 'login')->name('login');
    
    Route::get('google/redirect', 'redirectToGoogle')->name('login.google');
    Route::get('google/callback', 'handleGoogleCallback')->name('callback.google');
    
    Route::get('logout', 'logout')->name('logout');
});

Route::middleware('accessToken')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('', 'show')->name('home');
        Route::get('users/ajax', 'getByAjax')->name('users.ajax');
    });
});

Route::controller(BarController::class)->group(function () {
    Route::get('bars', 'viewAll')->name('bars');
    Route::get('bar/{id}', 'view')->name('bar.view');
    Route::post('bar/{id}', 'update')->name('bar.update');
});

Route::controller(HotelController::class)->group(function () {
    Route::get('hotels', 'viewAll')->name('hotels');
    Route::get('hotel/{id}', 'view')->name('hotel.view');
    Route::post('hotel/{id}', 'update')->name('hotel.update');
});

Route::controller(RestaurantController::class)->group(function () {
    Route::get('restaurants', 'viewAll')->name('restaurants');
    Route::get('restaurant/{id}', 'view')->name('restaurant.view');
    Route::post('restaurant/{id}', 'update')->name('restaurant.update');
});

Route::controller(DiscoverController::class)->group(function () {
    Route::get('discovers', 'viewAll')->name('discovers');
    Route::get('discover/{id}', 'view')->name('discover.view');
    Route::post('discover/{id}', 'update')->name('discover.update');
});