<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

// HOME PAGE
Route::get('/', function () {
    return view('home');
});

// DASHBOARD (only for logged in users)
Route::get('/dashboard', function () {
    if (! auth()->check()) {
        return redirect('/'); // redirect to login if not logged in
    }

    $myPosts = auth()->user()->posts()->latest()->get();
    $allPosts = Post::latest()->get();

    return view('dashboard', ['myPosts' => $myPosts, 'allPosts' => $allPosts]);
});

require __DIR__.'/auth.php';
require __DIR__.'/posts.php';
