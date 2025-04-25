<?php

namespace Database\Seeders;

use App\Models\FoodsIngredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodsIngredients::factory(50)->create();
    }
}
