<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class , 'index'])->name('index');

// foods route
Route::resource('foods', FoodController::class)->only('index', 'show');

// with auth middleware
Route::middleware('auth')->group(function() {
    // cart routes
    Route::prefix('cart')->group(function() {
        Route::get('/index', [CartController::class , 'index'])->name('cart.index');
        Route::post('/add/{food}', [CartController::class , 'add'])->name('cart.add');
        Route::post('/remove/{food}', [CartController::class , 'remove'])->name('cart.remove');
        Route::post('/checkout', [CartController::class , 'checkout'])->name('cart.checkout');
    });

    // booking routes
    Route::resource('booking', BookingController::class)->except('show');
});
