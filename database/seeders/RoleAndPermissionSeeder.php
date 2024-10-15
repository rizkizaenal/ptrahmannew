<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat peran
        $roles = ['user', 'admin', 'super_admin'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Jika Anda ingin menambahkan izin, Anda bisa melakukannya di sini
        $permissions = [
            'view dashboard',
            'manage agenda',
            'manage atensi',
            // Tambahkan izin lainnya sesuai kebutuhan
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Menetapkan izin ke peran
        // Contoh: Memberikan semua izin kepada super_admin
        $superAdminRole = Role::findByName('super_admin');
        $superAdminRole->givePermissionTo(Permission::all());

        // Memberikan izin tertentu ke admin
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(['view dashboard', 'manage agenda']);

        // Memberikan izin terbatas ke user biasa
        $userRole = Role::findByName('user');
        $userRole->givePermissionTo('view dashboard');
    }
    
}
