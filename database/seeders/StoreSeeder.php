<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            "name" => "Store 1",
            "email" => "store1@gmail.com",
            "contact_number" => "9876543210",
            "location" => "Veerji Tower, Phase 8B Industrial Area, 140308",
            "is_deleted" => 0,
        ]);
    }
}
