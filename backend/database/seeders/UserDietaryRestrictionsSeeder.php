<?php

namespace Database\Seeders;
use App\Models\UserDietaryResctrictions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserDietaryRestrictionsSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserDietaryResctrictions::factory(20)->create();
    }
}
