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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'old_password' => 'nullable|string',
            'new_password' => 'nullable|string|confirmed|min:6',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');
    
        // Update password if provided
        if ($request->filled('old_password') && $request->filled('new_password')) {
            if (Hash::check($request->input('old_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                return back()->with('error', 'Old password does not match!');
            }
        }
    
        // Handle profile photo update
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/' . $user->photo)) {
                Storage::delete('public/' . $user->photo);
            }
    
            $path = $request->file('photo')->store('public/photos');
            $user->photo = str_replace('public/', '', $path);
        }
    
        // Save updated user information
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
