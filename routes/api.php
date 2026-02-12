<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\DeletePostController;
use App\Http\Controllers\Post\EditPostController;
use App\Http\Controllers\Post\UpdatePostController;

use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\LogoutUserController;
use App\Http\Controllers\User\RegisterUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    // Auth routes
    Route::post('/register', RegisterUserController::class);
    Route::post('/login', LoginUserController::class);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', LogoutUserController::class);

        // Posts CRUD
        Route::post('/posts', CreatePostController::class);
        Route::put('/posts/{post}', UpdatePostController::class);
        Route::delete('/posts/{post}', DeletePostController::class);

    });
});