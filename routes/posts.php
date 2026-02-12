<?php

use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\DeletePostController;
use App\Http\Controllers\Post\EditPostController;
use App\Http\Controllers\Post\UpdatePostController;
use Illuminate\Support\Facades\Route;

//  POST ROUTES CRUD operations for posts, only accessible to authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/posts', CreatePostController::class)->name('posts.create');
    Route::get('/posts/{post}/edit', EditPostController::class)->name('posts.edit');
    Route::put('/posts/{post}', UpdatePostController::class)->name('posts.update');
    Route::delete('/posts/{post}', DeletePostController::class)->name('posts.delete');
});
