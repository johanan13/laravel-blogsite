<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class DeletePost
{
    public function handle(Post $post): bool
    {
        if (Auth::user()->cannot('delete', $post)) {
            throw new UnauthorizedException('You are not authorized to delete this post.');
        }

        return $post->delete();
    }
}
