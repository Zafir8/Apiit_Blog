<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;


uses(RefreshDatabase::class);

it('registers a club with valid email domain and assigns club role', function () {
    $response = post('/register', [
        'user_type' => 'club',
        'name' => 'Club Leader',
        'email' => 'leader@students.apiit.lk',
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => 'on',
    ]);

    $response->assertRedirect('/dashboard');
    $user = User::where('email', 'leader@students.apiit.lk')->first();
    expect($user)->role->toBe('CLUB');
});

it('fails club registration with invalid email domain', function () {
    $response = post('/register', [
        'user_type' => 'club',
        'name' => 'Club Leader',
        'email' => 'leader@gmail.com', // Invalid club domain
        'password' => 'password',
        'password_confirmation' => 'password',
        'terms' => 'on',
    ]);

    $response->assertSessionHasErrors('email');
});
