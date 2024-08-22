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

        $permissions = [
            'backend',
            'frontend',
            'view stores', 'create stores', 'edit stores', 'delete stores',
            'view users', 'create users', 'edit users', 'delete users',
            'view categories', 'create categories', 'edit categories', 'delete categories',
            'view product', 'create product', 'edit product', 'delete product',
            'view prices', 'create prices', 'edit prices', 'delete prices',
            'view discounts', 'create discounts', 'edit discounts', 'delete discounts',
            'view sales', 'create sales', 'edit sales', 'delete sales',
            'view units', 'create units', 'edit units', 'delete units',
            'view return stocks', 'create return stocks', 'edit return stocks', 'delete return stocks',
            'view inventory transfers', 'create inventory transfers', 'edit inventory transfers', 'delete inventory transfers',
            'view customers', 'create customers', 'edit customers', 'delete customers',
            'view roles & permissions', 'create roles & permissions', 'edit roles & permissions', 'delete roles & permissions',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles = [
            'Super Admin' => Permission::all(),
            'Admin' => Permission::all(),
            'Manager' => ['backend', 'view sales', 'view return stocks', 'create return stocks', 'edit return stocks', 'delete return stocks', 'view inventory transfers', 'view customers'],
            'Sales Person' => ['frontend']
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);

            if (is_array($permissions)) {
                $role->givePermissionTo($permissions);
            } else {
                $role->givePermissionTo($permissions);
            }
        }
    }
}
