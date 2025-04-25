<?php

namespace Database\Seeders;

use App\Models\FoodsTags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodsTags::factory(20)->create();
    }
}
