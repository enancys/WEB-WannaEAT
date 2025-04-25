<?php

namespace Database\Seeders;

use App\Models\Restrictions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestrictionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restrictions::factory(10)->create();
    }
}
