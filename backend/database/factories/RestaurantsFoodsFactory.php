<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RestaurantsFoods;
use App\Models\Restaurants;
use App\Models\Foods;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantsFoods>
 */
class RestaurantsFoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurants::inRandomOrder()->first()?->id ?? 1,
            'food_id' => Foods::inRandomOrder()->first()?->id ?? 1,
            'price' => $this->faker->randomFloat(2, 10000, 100000),
        ];
    }
}
