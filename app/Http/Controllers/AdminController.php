<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil data yang diperlukan untuk halaman admin
        return view('admin.dashboard'); // Mengarah ke view admin dashboard
    }

    // Tambahkan metode lain yang diperlukan untuk admin
}
