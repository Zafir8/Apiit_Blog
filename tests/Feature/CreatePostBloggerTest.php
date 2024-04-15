<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);

it('allows an admin to approve a post', function () {
    // Create a user with admin role
    $admin = User::factory()->create(['role' => 'ADMIN']);
    // Create a user with blogger role
    $blogger = User::factory()->create(['role' => 'BLOGGER']);

    // Log in as the blogger
    Auth::login($blogger);

    // Create a new post
    $post = Post::factory()->create([
        'user_id' => $blogger->id,
        'is_approved' => false, // The post is not approved initially
    ]);

    // Log in as the admin
    Auth::login($admin);

    // Approve the post
    $response = $this->post('/posts/' . $post->id . '/approve');

    // Assert the post is now approved
    $post->refresh();
    expect($post->is_approved)->toBeTrue();

    // Optionally, you can also assert the response status code
    $response->assertStatus(200);
});
