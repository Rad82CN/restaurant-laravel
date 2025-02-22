<?php

// Admin control panel routes

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\FoodAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\BookingAdminController;
use Illuminate\Support\Facades\Route;

// without admin middleware
Route::prefix('admin')->group(function() {
    // admin auth routes
    Route::get('/login', [AdminAuthController::class , 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class , 'authenticate']);
});

// with admin middleware
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/index', [AdminIndexController::class , 'index'])->name('admin.index');

    // admin food routes
    Route::resource('adminFoods', FoodAdminController::class);

    // admin booking routes
    Route::resource('adminBookings', BookingAdminController::class)->only('index', 'update', 'destroy');

    // admins routes
    Route::resource('admins', AdminController::class)->only('index', 'update');
    Route::resource('users', UserAdminController::class)->only('index', 'update');
});