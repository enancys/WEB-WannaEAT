<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Cuisines;
use App\Models\UserFavoriteCuisines;
use App\Models\UserPreferences;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFavoriteCuisines>
 */
class UserFavoriteCuisinesFactory extends Factory
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
            'cuisine_id' => Cuisines::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
