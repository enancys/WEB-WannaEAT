<?php

namespace Database\Seeders;

use App\Models\RestaurantsFoods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsFoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RestaurantsFoods::factory(30)->create();
    }
}
