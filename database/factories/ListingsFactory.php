<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listings>
 */
class ListingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
                return [
                    'title' => fake()->sentence(),
                    'email' => fake()->unique()->safeEmail(),
                    'tags' => 'laravel, api, backend',
                    'company' => fake()->company(),
                    'location' => fake()->city(),
                    'website' => fake()->url(),
                    'description' => fake()->paragraph(5),
                ];
    }
}
