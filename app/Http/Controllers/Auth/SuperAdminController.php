<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        // Mengambil data yang diperlukan untuk halaman super admin
        return view('super_admin.dashboard'); // Mengarah ke view super admin dashboard
    }

    // Tambahkan metode lain yang diperlukan untuk super admin
}
