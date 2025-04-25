<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredients;
use App\Models\Foods;
use App\Models\FoodsIngredients;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodsIngredients>
 */
class FoodsIngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'food_id' => Foods::inRandomOrder()->first()?->id ?? 1,
            'ingredient_id' => Ingredients::inRandomOrder()->first()?->id ?? 1,
            'quantity' => fake()->randomFloat(2, 1, 500),
            'unit' => fake()->randomElement(['gram', 'ml', 'pcs']),
        ];
    }
}
