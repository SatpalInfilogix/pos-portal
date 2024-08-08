<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create(['name' => 'Cup']);
        Unit::create(['name' => 'Cone']);
        Unit::create(['name' => 'Box']);
        Unit::create(['name' => 'Bricks']);
    }
}
