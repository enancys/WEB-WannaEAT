<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            CuisinesSeeder::class,
            CategoriesSeeder::class,
            IngredientsSeeder::class,
            RestrictionsSeeder::class,
            TagsSeeder::class,
            RestaurantsSeeder::class,
            FoodsSeeder::class,
            FoodsIngredientsSeeder::class,
            RestaurantsFoodsSeeder::class,
            FoodsTagsSeeder::class,
            RatingsSeeder::class,
            UserPreferencesSeeder::class,
            UserDietaryRestrictionsSeeder::class,
            UserDislikedIngredientsSeeder::class,
            UserFavoriteCategoriesSeeder::class,
            UserFavoriteCuisinesSeeder::class,
            FavCategoryIngredientsSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
