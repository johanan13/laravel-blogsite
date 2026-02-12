<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost
{
    public function handle(array $data): Post
    {
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = Auth::id();

        return Post::create($data);
    }
}
