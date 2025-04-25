<?php

namespace Database\Seeders;

use App\Models\UserFavoriteCuisines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFavoriteCuisinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFavoriteCuisines::factory(20)->create();
    }
}
