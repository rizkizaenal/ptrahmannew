<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $user)
{
    // Arahkan pengguna ke halaman berbeda berdasarkan role
    if ($user->hasRole('super_admin')) {
        return redirect()->route('super_admin.dashboard');
    } elseif ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard'); // Pastikan ini benar
    } elseif ($user->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }

    // Jika role tidak ditemukan, default ke dashboard umum
    return redirect('/dashboard');
}


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function credentials(Request $request)
{
    // Pastikan akun absolut dapat login
    if ($request->email === 'Admin@gmail.com' && $request->password === 'lapas12345') {
        return ['email' => 'Admin@gmail.com', 'password' => 'lapas12345'];
    }

    // Login biasa
    return $request->only('email', 'password');
}


}