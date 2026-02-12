<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Post\DeletePost;
use Illuminate\Support\Facades\Gate;

class DeletePostController extends Controller
{
    /**
     * Delete a post.
     *
     * @group Posts
     * @urlParam post integer required The ID of the post to delete. Example: 1
     * @response 302 {
     *   "message": "Post deleted successfully."
     * }
     * @response 403 {
     *   "message": "This action is unauthorized."
     * }
     * @response 404 {
     *   "message": "Post not found."
     * }
     */
    public function __invoke(Post $post, DeletePost $deletePost)
    {
        Gate::authorize('delete', $post);

        $deletePost->handle($post);

        return redirect('/dashboard')->with('success', 'Post deleted successfully.');
    }
}