<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'create and edit pages']);
        Permission::create(['name' => 'delete pages']);
        Permission::create(['name' => 'permanently delete pages']);
        Permission::create(['name' => 'create and edit components']);
        Permission::create(['name' => 'delete components']);
        Permission::create(['name' => 'permanently delete components']);
        Permission::create(['name' => 'add media']);
        Permission::create(['name' => 'delete media']);
        Permission::create(['name' => 'manage ecommerce']);
        Permission::create(['name' => 'manage users']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
