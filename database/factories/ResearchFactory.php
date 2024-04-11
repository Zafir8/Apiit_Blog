<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\research>
 */
class ResearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(10),
            'published_at' => $this->faker->dateTimeBetween('-1 Week', '+1 week'),
            'image' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug(3),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
