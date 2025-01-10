<?php

// Admin control panel routes

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

// with admin middleware
Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/index', [AdminIndexController::class , 'index'])->name('admin.index');

    // admin food routes
    Route::resource('adminFoods', FoodController::class);
});

// without admin middleware
Route::prefix('admin')->group(function() {
    // admin auth routes
    Route::get('/login', [AdminAuthController::class , 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class , 'authenticate']);
});