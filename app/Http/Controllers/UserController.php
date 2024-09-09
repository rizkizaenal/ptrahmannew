<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   // Menampilkan daftar pengguna dengan role super_admin
   public function showSuperAdmins()
   {
       $superAdmins = User::where('role', 'super_admin')->get();
       return view('admin.superadmins', compact('superAdmins'));
   }
}
