<?php

namespace Database\Seeders;

use App\Models\UserFavoriteCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFavoriteCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFavoriteCategories::factory(20)->create();
    }
}
