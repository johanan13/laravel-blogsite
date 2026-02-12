<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Services\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $postService = $this->mock(PostService::class);
        $postService->shouldReceive('createPost')->once();

        $response = $this->post(route('posts.create'), [
            'title' => 'Test Title',
            'body' => 'Test Body',
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_can_update_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $postService = $this->mock(PostService::class);
        $postService->shouldReceive('updatePost')->once();

        $response = $this->put(route('posts.update', $post), [
            'title' => 'Updated Title',
            'body' => 'Updated Body',
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_can_delete_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $postService = $this->mock(PostService::class);
        $postService->shouldReceive('deletePost')->once();

        $response = $this->delete(route('posts.delete', $post));

        $response->assertRedirect('/dashboard');
    }
}
