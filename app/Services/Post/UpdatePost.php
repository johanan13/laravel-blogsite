<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class UpdatePost
{
    public function handle(Post $post, array $data): bool
    {
        if (Auth::user()->cannot('update', $post)) {
            throw new UnauthorizedException('You are not authorized to update this post.');
        }

        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);

        return $post->update($data);
    }
}
