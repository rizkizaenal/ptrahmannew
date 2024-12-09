<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Jalankan database seed untuk akun super_admin.
     *
     * @return void
     */
    public function run()
    {
        // Cek apakah akun super_admin sudah ada
        if (!User::where('email', 'Admin@gmail.com')->exists()) {
            // Buat akun super_admin jika belum ada
            User::create([
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'password' => Hash::make('lapas12345'),
                'role' => 'super_admin', // Pastikan kolom role ada di tabel users
            ]);
        }
    }
}
