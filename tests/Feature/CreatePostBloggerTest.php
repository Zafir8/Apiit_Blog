<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows a blogger to submit a post and an admin to approve it', function () {
    // Create a blogger user
    $blogger = User::factory()->create(['role' => 'BLOGGER']);

    // Create an admin user
    $admin = User::factory()->create(['role' => 'ADMIN']);

    // Blogger submits a post
    $post = Post::factory()->create([
        'user_id' => $blogger->id,
        'is_approved' => false, // Post is not approved initially
    ]);

    // Simulate admin approval
    $post->is_approved = true;
    $post->save();

    // Refresh the post instance to ensure we're working with the latest data
    $post = $post->fresh();

    // Assert that the post is now approved
    expect($post->is_approved)->toBeTrue();
});
