<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         // Create roles
         $superAdminRole = Role::create(['name' => 'super admin']);
         $adminRole = Role::create(['name' => 'admin']);
         $managerRole = Role::create(['name' => 'manager']);
         $salespersonRole = Role::create(['name' => 'salesperson']);
         
         // Create permissions
        //  $backendPermission = Permission::create(['name' => 'backend']);
        //  $posPermission = Permission::create(['name' => 'pos']);
         
         // Assign permissions to roles
        //  $superAdminRole->givePermissionTo([$backendPermission, $posPermission]);
        //  $adminRole->givePermissionTo($backendPermission);
        //  $managerRole->givePermissionTo($backendPermission);
        //  $salespersonRole->givePermissionTo($posPermission);
         
         $this->command->info('Roles and permissions added successfully!');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RolesAndPermissionsSeeder::class,
            ModuleSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
