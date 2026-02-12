<?php

use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\LogoutUserController;
use App\Http\Controllers\User\RegisterUserController;
use Illuminate\Support\Facades\Route;

// Guest routes 
Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('register');
    });

// Login & Registration routes
Route::get('/login', function () {
        return view('login');
    });

    Route::post('/register', RegisterUserController::class)->name('register');
    Route::post('/login', LoginUserController::class);
});

Route::post('/logout', LogoutUserController::class)->middleware('auth');
