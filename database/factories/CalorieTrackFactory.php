<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\calorieTrack>
 */
class CalorieTrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,4),
            'food' => fake()->name(),
            'quantity' => fake()->randomNumber(),
            'calories'=> fake()->randomNumber(),
            'dateFood'=> now(),
        ];
    }
}
