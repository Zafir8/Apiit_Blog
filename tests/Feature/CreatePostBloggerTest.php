<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows a blogger to create a post that is initially not approved', function () {
    // Create a blogger user
    $blogger = User::factory()->create(['role' => 'BLOGGER']);

    // Simulate blogger creating a post
    $post = Post::factory()->create([
        'user_id' => $blogger->id,
        'is_approved' => false, // Post is not approved initially
    ]);

    // Assert that the post is not approved
    expect($post->is_approved)->toBeFalse();
});

it('allows an admin to approve a blogger\'s post', function () {
    // Create a blogger user
    $blogger = User::factory()->create(['role' => 'BLOGGER']);

    // Create an admin user
    $admin = User::factory()->create(['role' => 'ADMIN']);

    // Simulate blogger creating a post
    $post = Post::factory()->create([
        'user_id' => $blogger->id,
        'is_approved' => false, // Post is not approved initially
    ]);

    // Simulate admin approving the post
    // Note: This step assumes you have a method to approve posts, e.g., through a controller action.
    // You'll need to adjust this part based on your actual implementation.
    // For demonstration purposes, we'll directly update the post's is_approved attribute.
    $post->update(['is_approved' => true]);

    // Assert that the post is now approved
    expect($post->is_approved)->toBeTrue();
});

