<?php


use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('authorized user can create an event', function () {
    Storage::fake('public');

    // Create a user with necessary permissions
    $user = User::factory()->create();

    // Use the Pest function to authenticate a user
    $this->actingAs($user);

    // Event data
    $eventData = [
        'title' => 'Tech Conference',
        'slug' => 'tech-conference',
        'description' => 'A detailed discussion on future technologies.',
        'start_date' => now()->addDays(10)->format('Y-m-d H:i:s'),
        'end_date' => now()->addDays(12)->format('Y-m-d H:i:s'),
        'published_at' => now()->format('Y-m-d H:i:s'),
        'featured' => true,
        'location' => 'Downtown Tech Hub',
        'image' => UploadedFile::fake()->image('event.jpg'),
    ];

    // Post the data to the correct route
    $response = $this->post('/admin/events', $eventData);

    // Assert the response status
    $response->assertStatus(302); // Assuming the route redirects after creation

    // Assert database has the event
    $this->assertDatabaseHas('events', [
        'title' => 'Tech Conference',
        'location' => 'Downtown Tech Hub'
    ]);

    // Additional checks for image storage
    $event = Event::where('title', 'Tech Conference')->first();
    expect($event->image)->not()->toBeNull();
    Storage::disk('public')->assertExists($event->image);
});
