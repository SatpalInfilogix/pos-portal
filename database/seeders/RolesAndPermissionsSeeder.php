<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'backend']);
        Permission::create(['name' => 'pos']);

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        
        Permission::create(['name' => 'view prices']);
        Permission::create(['name' => 'create prices']);
        Permission::create(['name' => 'edit prices']);
        Permission::create(['name' => 'delete prices']);

        Permission::create(['name' => 'view discounts']);
        Permission::create(['name' => 'create discounts']);
        Permission::create(['name' => 'edit discounts']);
        Permission::create(['name' => 'delete discounts']);

        Permission::create(['name' => 'view roles & permissions']);
        Permission::create(['name' => 'create roles & permissions']);
        Permission::create(['name' => 'edit roles & permissions']);
        Permission::create(['name' => 'delete roles & permissions']);

        $role = Role::where(['name' => 'super admin'])->first();
        $role->givePermissionTo(Permission::all());

        $adminRole = Role::where(['name' => 'admin'])->first();
        $adminRole->givePermissionTo('backend');

        $managerRole = Role::where(['name' => 'manager'])->first();
        $managerRole->givePermissionTo('backend');

        $salespersonRole = Role::where(['name' => 'salesperson'])->first();
        $salespersonRole->givePermissionTo('backend');

    }
}
