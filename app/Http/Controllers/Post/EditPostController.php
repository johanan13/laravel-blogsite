<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class EditPostController extends Controller
{
    /**
     * Show the form to edit a post.
     *
     * @group Posts
     * @urlParam post integer required The ID of the post. Example: 1
     * @response 200 {
     *   "id": 2,
     *   "title": "My first post",
     *   "body": "Hello world!",
     *   "created_at": "2026-02-12 15:23:00",
     *   "updated_at": "2026-02-12 15:23:00"
     * }
     * @response 403 {
     *   "message": "This action is unauthorized."
     * }
     */
    public function __invoke(Post $post)
    {
        Gate::authorize('view', $post);

        return view('edit-post', ['post' => $post]);
    }
}