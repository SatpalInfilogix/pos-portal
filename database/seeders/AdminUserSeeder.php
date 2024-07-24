<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create super admin user
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('Admin@12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign 'super admin' role to the super admin user
        $superAdminRole = Role::where('name', 'super admin')->first();
        $superAdmin->assignRole($superAdminRole);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Assign 'admin' role to the admin user
        $adminRole = Role::where('name', 'admin')->first();
        $admin->assignRole($adminRole);

        // Create manager user
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('Manager@12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Assign 'manager' role to the manager user
        $managerRole = Role::where('name', 'manager')->first();
        $manager->assignRole($managerRole);

        // Create salesperson user
        $salesperson = User::create([
            'name' => 'Salesperson User',
            'email' => 'salesperson@gmail.com',
            'password' => Hash::make('Salesperson@12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Assign 'salesperson' role to the salesperson user
        $salespersonRole = Role::where('name', 'salesperson')->first();
        $salesperson->assignRole($salespersonRole);

        $this->command->info('Users created with roles and permissions!');
    }
}
