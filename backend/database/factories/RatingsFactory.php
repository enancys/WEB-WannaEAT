<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ratings;
use App\Models\Foods;
use App\Models\User;
use App\Models\Restaurants;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ratings>
 */
class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1,
            'food_id' => Foods::inRandomOrder()->first()?->id ?? null,
            'restaurant_id' => Restaurants::inRandomOrder()->first()?->id ?? null,
            'rating' => fake()->randomFloat(1, 1, 5),
            'review' => fake()->sentence(),
        ];
    }
}
