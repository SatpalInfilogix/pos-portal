<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'name' => 'Categories',
            'slug' => 'categories'
        ]);
        Module::create([
            'name' => 'Product',
            'slug' => 'product'
        ]);
        Module::create([
            'name' => 'Prices',
            'slug' => 'prices'
        ]);
        Module::create([
            'name' => 'Discounts',
            'slug' => 'discounts'
        ]);
        Module::create([
            'name' => 'Stores',
            'slug' => 'stores'
        ]);
        Module::create([
            'name' => 'Users',
            'slug' => 'users'
        ]);
        Module::create([
            'name' => 'Sales',
            'slug' => 'sales'
        ]);
        Module::create([
            'name' => 'Return Stocks',
            'slug' => 'return stocks'
        ]);
        Module::create([
            'name' => 'Inventory Transfers',
            'slug' => 'inventory transfers'
        ]);
        Module::create([
            'name' => 'Customers',
            'slug' => 'customers'
        ]);
        Module::create([
            'name' => 'Roles & Permissions',
            'slug' => 'roles & permissions'
        ]);
        Module::create([
            'name' => 'Units',
            'slug' => 'unit'
        ]);
    }
}
