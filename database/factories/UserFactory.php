<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'identificationType' => fake()->name(),
            'identificationNumber' => fake()->numberBetween(6000,10000000),
            'gender' => fake()->randomElement(["hombre","Mujer"]),
            'geoAddress' => fake()->randomElement(["3.896139, -76.288718","3.899950, -76.301979"]),
            'phone' => fake()->phoneNumber(),
            'photoIdFront' => Str::random(10),
            'photoIdBack' => Str::random(10),
            'photoFacial' => Str::random(10),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
