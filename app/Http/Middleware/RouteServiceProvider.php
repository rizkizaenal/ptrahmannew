<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Tempat untuk mengarahkan pengguna setelah login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Arahkan ke rute atau URL yang spesifik setelah login
        return redirect()->intended('/index'); // Ganti '/home' dengan rute yang diinginkan
    }

    /**
     * Membuat instance controller baru.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware untuk memastikan hanya tamu yang dapat mengakses halaman login, dan logout hanya bisa diakses oleh user yang terautentikasi
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
