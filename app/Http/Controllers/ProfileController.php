<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Display the profile page
    public function edit() {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function show()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('profile.show', compact('user')); // Replace 'profile.show' with your actual view
    }

    // Update the user profile
    public function update(Request $request)
    {
        $user = Auth::user(); // Mengambil pengguna yang sedang login
    
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'nullable|string',
            'new_password' => 'nullable|string|confirmed|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Update name dan email
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        // Update password jika ada input
        if ($request->filled('old_password') && $request->filled('new_password')) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return back()->with('error', 'Old password does not match!');
            }
        }
    
        // Update foto profil jika ada
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo); // Hapus file lama
            }
    
            $path = $request->file('photo')->store('public/photos');
            $user->photo = str_replace('public/', '', $path); // Simpan path foto
        }
    
        // Simpan perubahan
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
    
}
