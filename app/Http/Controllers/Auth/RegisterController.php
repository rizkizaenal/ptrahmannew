<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Tempat untuk mengarahkan pengguna setelah registrasi.
     *
     * @var string
     */
    protected $redirectTo = '/login'; // Setelah registrasi, redirect ke halaman login

    /**
     * Membuat instance controller baru.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); // Pastikan middleware guest digunakan
    }

    /**
     * Mendapatkan validator untuk permintaan registrasi yang masuk.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Membuat instance pengguna baru setelah pendaftaran yang valid.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Buat pengguna baru tanpa login otomatis
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
