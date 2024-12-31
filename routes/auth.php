<?php

// user registeration and login routes

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class , 'register'])->name('register');
    Route::post('/register', [AuthController::class , 'store']);
});