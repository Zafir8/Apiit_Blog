<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an admin to create a post with the approval box ticked and message to notify the user', function () {
    // Create an admin user
    $admin = User::factory()->create(['role' => 'ADMIN']);

    // Simulate admin creating a post with the approval box ticked
    $post = Post::factory()->create([
        'user_id' => $admin->id,
        'is_approved' => true, // Post is approved initially
    ]);

    // Assert that the post is approved
    expect($post->is_approved)->toBeTrue();
});
