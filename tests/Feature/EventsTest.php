<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows a blogger to create an event', function () {
    // Create a blogger user
    $blogger = User::factory()->create(['role' => User::ROLE_BLOGGER]);

    // Simulate blogger creating an event
    $event = Event::factory()->create([
        'user_id' => $blogger->id,
    ]);

    // Assert that the event was created successfully
    expect($event)->toBeInstanceOf(Event::class);
});

it('allows an admin to create an event', function () {
    // Create an admin user
    $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);

    // Simulate admin creating an event
    $event = Event::factory()->create([
        'user_id' => $admin->id,
    ]);

    // Assert that the event was created successfully
    expect($event)->toBeInstanceOf(Event::class);
});



