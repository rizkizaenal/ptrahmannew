<?php
// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Jika pengguna belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Jika role pengguna tidak sesuai, arahkan ke halaman lain
        if ($user->role !== $role) {
            return redirect('dashboard'); // Ganti 'home' dengan halaman yang sesuai
        }

        // Lanjutkan jika role sesuai
        return $next($request);
    }
}
