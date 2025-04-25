<?php

namespace Database\Factories;

use App\Models\Cuisines;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurants;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurants>
 */
class RestaurantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'location' => $this->faker->address(),
            'rating' => $this->faker->randomFloat(1, 1, 5), 
            'cuisine_id' => Cuisines::inRandomOrder()->first()?->id ?? Cuisines::factory(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
