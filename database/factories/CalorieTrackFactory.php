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
            'food' => fake()->randomElement(["Pan","arroz", "Pollo asado", "ensalada", "sopa", "hamburguesa"]),
            'quantity' => fake()->randomNumber(),
            'calories'=> fake()->randomNumber(),
            'dateFood'=> now(),
        ];
    }
}
