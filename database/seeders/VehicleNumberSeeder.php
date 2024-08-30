<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleNumber;

class VehicleNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleNumber::insert([
            ['vehicle_number' => 'PB013423'],
            ['vehicle_number' => 'PB043423'],
            ['vehicle_number' => 'PB053423'],
            ['vehicle_number' => 'PB058423'],
        ]);
    }
}
