<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cuisines;
use App\Models\Categories;
use App\Models\Foods;
use App\Models\Restaurants;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foods>
 */
class FoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 100),
            'image_url' => $this->faker->imageUrl(640, 480, 'food', true),
            'restaurant_id' => Restaurants::inRandomOrder()->first()?->id ?? 1,
            'cuisine_id' => Cuisines::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
