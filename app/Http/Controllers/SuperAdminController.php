<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Atensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import the Auth facade
use Illuminate\Support\Facades\Hash;  // Import the Hash facade
use Illuminate\Support\Facades\Storage;  // Import the Storage facade

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
    
    public function editProfile($id)
{
    $user = User::findOrFail($id); // Mendapatkan data user berdasarkan ID
    return view('super_admin.edit', compact('user'));
}

public function updateProfile(Request $request, $id)
{
    $user = User::findOrFail($id); // Mendapatkan data user berdasarkan ID

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'old_password' => 'nullable',
        'new_password' => 'nullable|min:8',
        'confirm_password' => 'same:new_password',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update Name and Email
    $user->name = $request->name;
    $user->email = $request->email;

    // Update Password
    if ($request->old_password && $request->new_password) {
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        } else {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }
    }

    // Update Profile Photo
    if ($request->hasFile('photo')) {
        if ($user->photo) {
            Storage::delete('public/' . $user->photo); // Hapus foto lama
        }
        $filePath = $request->file('photo')->store('profile_photos', 'public'); // Simpan foto baru
        $user->photo = $filePath; // Perbarui path di database
    }
    

    $user->save();

    return redirect()->route('superadmin.profile.edit', $user->id)->with('success', 'Profile updated successfully!');
}
public function deletePhoto($id)
{
    $user = User::findOrFail($id);

    // Check if the user has a photo and delete it
    if ($user->photo && Storage::exists('public/' . $user->photo)) {
        Storage::delete('public/' . $user->photo);
    }

    // Reset the photo field to null
    $user->photo = null;
    $user->save();

    return redirect()->route('superadmin.profile.edit', $user->id)->with('success', 'Profile photo deleted successfully!');
}

public function __construct()
{
    $this->middleware('auth'); // Pastikan hanya pengguna yang login bisa mengakses
}

}