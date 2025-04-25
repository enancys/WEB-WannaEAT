<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserDietaryResctrictions;
use App\Models\Restrictions;
use App\Models\UserPreferences;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDietaryResctrictions>
 */
class UserDietaryResctrictionsFactory extends Factory 
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
            'restriction_id' => Restrictions::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
