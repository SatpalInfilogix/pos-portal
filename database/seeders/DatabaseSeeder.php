<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Sales Person']);
        
        $this->call([
            RolesAndPermissionsSeeder::class,
            ModuleSeeder::class,
            StoreSeeder::class,
            UserSeeder::class
        ]);
    }
}
