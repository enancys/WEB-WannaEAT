<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\FavCategoryIngredients;
use App\Models\Ingredients;
use App\Models\UserPreferences;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FavCategoryIngredients>
 */
class FavCategoryIngredientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_preference_id' => UserPreferences::inRandomOrder()->first()?->id ?? 1,
            'ingredient_id' => Ingredients::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
