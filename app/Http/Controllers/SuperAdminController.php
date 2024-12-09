<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Agenda;
use App\Models\Atensi;

class SuperAdminController extends Controller
{

    public function index()
    {
        $agendas = Agenda::all(); // Make sure you fetch your agendas
        $atensi = Atensi::all(); // Fetch attentions if needed
        $users = User::paginate(10); // Fetch users if needed
        $hasSuperAdmin = User::where('role', 'superadmin')->exists();

        return view('super_admin.dashboard', compact('agendas', 'atensi', 'users'));
    }
    public function __construct()
    {
        $this->middleware('auth'); // Ensure authentication
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        return view('super_admin.edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'old_password' => 'nullable',
            'new_password' => 'nullable|min:8',
            'confirm_password' => 'same:new_password',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password
        if ($request->old_password && $request->new_password) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return back()->withErrors(['old_password' => 'Old password is incorrect']);
            }
        }

        // Update profile photo
        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo); // Delete old photo
            }
            $filePath = $request->file('photo')->store('profile_photos', 'public');
            $user->photo = $filePath;
        }

        $user->save();

        return redirect()->route('superadmin.profile.edit', $user->id)->with('success', 'Profile updated successfully!');
    }

    public function deletePhoto($id)
{
    $user = User::findOrFail($id);

    // Hapus file foto dari storage jika ada
    if ($user->photo && \Storage::exists($user->photo)) {
        \Storage::delete($user->photo);
    }

    // Update kolom `photo` menjadi null
    $user->photo = null;
    $user->save();

    return redirect()->back()->with('success', 'Profile photo has been removed successfully!');
}
}
