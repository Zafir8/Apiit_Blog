<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

// Test for a student registration
test('students must register with valid student email domain and required student fields', function () {
    $response = post('/register', [
        'user_type' => 'student',
        'name' => 'John Doe',
        'email' => 'john.doe@students.apiit.lk',
        'password' => 'password',
        'password_confirmation' => 'password',
        'school' => 'computing',
        'cb_number' => 'CB009123',
        'degree' => 'Computer Science',
        'level' => '5',
        'terms' => 'on',
    ]);

    $response->assertRedirect('/dashboard');
    expect(User::where('email', 'john.doe@students.apiit.lk')->exists())->toBeTrue();
});

// Test for a staff registration
test('staff must register with valid staff email domain and not require student-specific fields', function () {
    $response = post('/register', [
        'user_type' => 'staff',
        'name' => 'Jane Smith',
        'email' => 'jane.smith@apiit.lk',
        'password' => 'password',
        'password_confirmation' => 'password',
        'school' => 'computing',
        'terms' => 'on',
    ]);

    $response->assertRedirect('/dashboard');
    expect(User::where('email', 'jane.smith@apiit.lk')->exists())->toBeTrue();
    expect(User::where('email', 'jane.smith@apiit.lk')->first()->cb_number)->toBeNull();
});

// Test for an alumni registration
test('alumni can register with any email if NIC or passport is recognized in the allowed_users table', function () {
    // Ensure there's a matching entry in the allowed_users table
    DB::table('allowed_users')->insert([
        'name' => 'Tharanga Peiris',
        'NIC_or_passport' => '987654321122',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Attempt to register as an alumni
    $response = post('/register', [
        'user_type' => 'alumni',
        'name' => 'Tharanga Peiris',
        'email' => 'tharanga.perera@gmail.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'nic_or_passport' => '987654321122', // This should match the entry in the allowed_users table
        'terms' => 'on',
        'school' => 'Not Applicable', // Provide a default value or an actual school name if applicable
    ]);

    // Assert redirection to the root URL after registration
    $response->assertRedirect('/dashboard');

    // Check the user's existence in the database with the provided email
    $user = User::where('email', 'tharanga.perera@gmail.com')->first();
    expect($user)->not->toBeNull();
    expect($user->nic_or_passport)->toEqual('987654321122');

    // Verify that the 'school' field is filled for alumni
    expect($user->school)->toEqual('Not Applicable');
});



// Test handling errors for incorrect domains
test('users cannot register with incorrect domain for their role', function () {
    $response = post('/register', [
        'user_type' => 'student',
        'name' => 'Frank Wrong',
        'email' => 'frank.wrong@apiit.lk', // Incorrect domain for student
        'password' => 'password',
        'password_confirmation' => 'password',
        'school' => 'computing',
        'cb_number' => 'CB009125',
        'degree' => 'Information Technology',
        'level' => '4',
        'terms' => 'on',
    ]);

    $response->assertSessionHasErrors('email');
});


// Test handling errors for incorrect NIC or passport numbers
test('alumni cannot register with an unrecognised NIC or passport number', function () {
    $response = post('/register', [
        'user_type' => 'alumni',
        'name' => 'Unrecognised Alumni',
        'email' => 'hello@gmail.com' , // Any email is allowed for alumni
        'password' => 'password',
        'password_confirmation' => 'password',
        'nic_or_passport' => '123456789012', // Unrecognised NIC or passport number
        'terms' => 'on',
        'school' => 'Not Applicable', // Provide a default value or an actual school name if applicable
    ]);

    $response->assertSessionHasErrors('nic_or_passport');


});


