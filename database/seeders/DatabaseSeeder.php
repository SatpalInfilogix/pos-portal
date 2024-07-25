<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create roles
        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Sales Person']);
         
         // Create permissions
        //  $backendPermission = Permission::create(['name' => 'backend']);
        //  $posPermission = Permission::create(['name' => 'pos']);
         
         // Assign permissions to roles
        //  $superAdminRole->givePermissionTo([$backendPermission, $posPermission]);
        //  $adminRole->givePermissionTo($backendPermission);
        //  $managerRole->givePermissionTo($backendPermission);
        //  $salespersonRole->givePermissionTo($posPermission);
         
        $this->command->info('Roles and permissions added successfully!');
        
        $this->call([
            RolesAndPermissionsSeeder::class,
            ModuleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
