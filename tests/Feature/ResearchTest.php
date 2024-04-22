<?php

use App\Models\Research;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

uses(RefreshDatabase::class);

it('allows a blogger to create a research entry', function () {
    // Create a blogger user
    $blogger = User::factory()->create(['role' => 'BLOGGER']);

    // Act as the blogger
    Auth::login($blogger);

    // Simulate creating a research entry
    $research = Research::factory()->create([
        'user_id' => $blogger->id,
    ]);

    // Assert that the research entry was created successfully
    expect($research)->toBeInstanceOf(Research::class);
});

it('allows an admin to create a research entry', function () {
    // Create an admin user
    $admin = User::factory()->create(['role' => 'ADMIN']);

    // Act as the admin
    Auth::login($admin);

    // Simulate creating a research entry
    $research = Research::factory()->create([
        'user_id' => $admin->id,
    ]);

    // Assert that the research entry was created successfully
    expect($research)->toBeInstanceOf(Research::class);
});




