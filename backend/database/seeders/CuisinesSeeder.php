<?php

namespace Database\Seeders;

use App\Models\Cuisines;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cuisines::factory(10)->create();
    }
}
