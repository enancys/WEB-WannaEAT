<?php

namespace Database\Seeders;

use App\Models\UserDislikedIngredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDislikedIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDislikedIngredients::factory(20)->create();
    }
}
