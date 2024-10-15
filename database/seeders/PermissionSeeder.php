<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Membuat Permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // Membuat Roles dan Assign Permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(['edit articles', 'delete articles', 'publish articles']);

        $role = Role::create(['name' => 'super_admin']);
        $role->givePermissionTo(Permission::all());
    }
}
