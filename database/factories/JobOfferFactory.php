<?php

namespace Database\Factories;

use App\Models\JobOffer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(2, true),
            'salary' => fake()->numberBetween(20_000, 150_000),
            'location' => fake()->city,
            'category' => fake()->randomElement(JobOffer::$category),
            'experience' => fake()->randomElement(JobOffer::$experience)
        ];
    }
}
