<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Post;
use App\Services\Post\UpdatePost;

class UpdatePostController extends Controller
{
    /**
     * Update an existing post.
     *
     * @group Posts
     * @urlParam post integer required The ID of the post to update. Example: 1
     * @bodyParam title string required The title of the post. Example: Updated Post Title
     * @bodyParam body string required The body content of the post. Example: This is the updated post content.
     * @response 302 {
     *   "message": "Post updated successfully!"
     * }
     * @response 403 {
     *   "message": "This action is unauthorized."
     * }
     * @response 422 {
     *   "message": "The given data was invalid.",
     *   "errors": {
     *       "title": ["The title field is required."],
     *       "body": ["The body field is required."]
     *   }
     * }
     */
    public function __invoke(UpdatePostRequest $request, Post $post, UpdatePost $updatePost)
    {
        $updatePost->handle($post, $request->validated());

        return redirect('/dashboard')->with('success', 'Post updated successfully!');
    }
}