<?php

// Admin control panel routes

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminIndexController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/index', [AdminIndexController::class , 'index'])->name('admin.index');
});

// admin auth routes
Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminAuthController::class , 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class , 'authenticate']);
});