<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutgoingLetter>
 */
class OutgoingLetterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date(),
            'number' => fake()->numerify,
            'recipient' => fake()->name,
            'street' => fake()->streetName,
            'city' => fake()->city,
            'code' => fake()->postcode,
            'country' => fake()->country,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
