<?php

namespace Database\Seeders;

use App\Models\FavCategoryIngredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavCategoryIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FavCategoryIngredients::factory(20)->create();
    }
}
