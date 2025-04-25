<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restrictions;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restrictions>
 */
class RestrictionsFactory extends Factory
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
        ];
    }
}
