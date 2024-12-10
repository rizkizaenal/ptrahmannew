<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AtensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Exports\AgendaExport;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk otentikasi
Auth::routes();

// Rute setelah login berhasil
Route::get('/home', function () {
    if (Auth::user()->hasRole('super_admin')) {
        return redirect()->route('super_admin.dashboard');
    } elseif (Auth::user()->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('dashboard'); // Rute untuk user biasa
    }
})->name('home');

// Kelompok rute untuk pengguna biasa dengan role 'user'
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('agenda')->group(function () {
        Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');
        Route::get('/create', [AgendaController::class, 'create'])->name('agenda.create');
        Route::post('/', [AgendaController::class, 'store'])->name('agenda.store');
        Route::get('/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
        Route::put('/{id}', [AgendaController::class, 'update'])->name('agenda.update');
        Route::delete('/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
        Route::get('/export', [AgendaController::class, 'export'])->name('agenda.export');
    });

    Route::prefix('forms')->group(function () {
        // Menampilkan daftar atensi
        Route::get('/atensi', [AtensiController::class, 'index'])->name('atensi.index');
        
        // Menampilkan form untuk membuat atensi baru
        Route::get('/atensi/create', [AtensiController::class, 'create'])->name('atensi.create');
        
        // Menyimpan data atensi baru
        Route::post('/atensi/store', [AtensiController::class, 'store'])->name('atensi.store');
        
        // Menampilkan detail satu atensi
        Route::get('/atensi/{id}', [AtensiController::class, 'show'])->name('atensi.show');
        
        // Menampilkan form edit atensi
        Route::get('/atensi/{id}/edit', [AtensiController::class, 'edit'])->name('atensi.edit');
        
        // Mengupdate data atensi yang ada
        Route::put('/atensi/{id}', [AtensiController::class, 'update'])->name('atensi.update');
        
        // Menghapus data atensi
        Route::delete('/atensi/{id}', [AtensiController::class, 'destroy'])->name('atensi.destroy');
    });
    
});

// Rute untuk profil
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Kelompok rute untuk admin


// Kelompok rute untuk super admin
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/admin/dashboard', [SuperAdminController::class, 'index'])->name('super_admin.dashboard');
   // Edit profile route
Route::get('profile/edit/{id}', [SuperAdminController::class, 'editProfile'])->name('superadmin.profile.edit');

// Update profile route
Route::put('profile/update/{id}', [SuperAdminController::class, 'updateProfile'])->name('superadmin.profile.update');

// Delete profile photo route
Route::delete('profile/photo/{id}', [SuperAdminController::class, 'deletePhoto'])->name('superadmin.profile.deletePhoto');

Auth::routes();

});
Auth::routes();


// Rute untuk mengekspor agenda
Route::get('/export-agenda', function () {
    $export = new AgendaExport();
    return $export->export();
});

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Mengarahkan ke halaman utama
})->name('logout');
