<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postService = new PostService();
        $postService->createPost([
            'title' => 'Test Title',
            'body' => 'Test Body',
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Title',
            'body' => 'Test Body',
            'user_id' => $user->id,
        ]);
    }

    public function test_can_update_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $postService = new PostService();
        $postService->updatePost($post, [
            'title' => 'Updated Title',
            'body' => 'Updated Body',
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'body' => 'Updated Body',
        ]);
    }

    public function test_can_delete_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $postService = new PostService();
        $postService->deletePost($post);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
}
