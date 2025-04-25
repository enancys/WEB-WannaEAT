<?php

namespace Database\Factories;
use App\Models\Tags;
use App\Models\Foods;
use App\Models\FoodsTags;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodsTags>
 */
class FoodsTagsFactory extends Factory
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
            'tag_id' => Tags::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
