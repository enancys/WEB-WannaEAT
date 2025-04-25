<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categories;
use App\Models\UserFavoriteCategories;
use App\Models\UserPreferences;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFavoriteCategories>
 */
class UserFavoriteCategoriesFactory extends Factory
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
            'category_id' => Categories::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
