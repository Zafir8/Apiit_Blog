<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows the RSVP button to authenticated users', function () {
    // Create a user
    $user = User::factory()->create();

    // Create an event
    $event = Event::factory()->create([
        'title' => 'Sample Event',
        'rsvp_link' => 'https://example.com/rsvp',
    ]);

    // Simulate the authenticated user
    $this->actingAs($user);

    // Make a request to the view that contains the event cards
    $response = $this->get(route('events.index'));


    // Assert that the RSVP button is visible
    $response->assertSee('Add to Calendar');
    $response->assertSee($event->rsvp_link);
});

it('hides the RSVP button from guests', function () {
    // Create an event
    $event = Event::factory()->create([
        'title' => 'Sample Event',
        'rsvp_link' => 'https://example.com/rsvp',
    ]);

    // Make a request to the view that contains the event cards as a guest
    $response = $this->get(route('events.index'));

    // Debugging: Output the response content
    \Log::info($response->getContent());

    // Assert that the RSVP button is not visible
    $response->assertDontSee('Add to Calendar');
    $response->assertDontSee($event->rsvp_link);
});
