<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Category::factory(5)->create();
        // add seeder for research
        \App\Models\Research::factory(50)->create();
        // for events
        \App\Models\Event::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'super_admin@apiit.lk',
            'password' => bcrypt('admin'),
            'role' => 'ADMIN',
        ]);

        $this->call([
            AllowedUsersTableSeeder::class,
        ]);

    }
}
