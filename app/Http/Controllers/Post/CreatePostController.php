<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Services\Post\CreatePost;

class CreatePostController extends Controller
{
    public function __invoke(CreatePostRequest $request, CreatePost $createPost)
    {
        /**
         * Create a new post.
         *
         * @group Posts
         * @bodyParam title string required The title of the post. Example: My first post
         * @bodyParam body string required The content of the post. Example: Hello world!
         * @response 201 {
         *   "id": 12,
         *   "title": "My first post",
         *   "body": "Hello world!",
         *   "created_at": "2026-02-12 15:23:00"
         * }
         */
        $createPost->handle($request->validated());

        return redirect('/dashboard')->with('success', 'Post created successfully!');
    }
}
