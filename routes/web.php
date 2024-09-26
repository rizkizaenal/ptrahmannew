<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AtensiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk otentikasi
Auth::routes();

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Rute untuk agenda
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index')->middleware('auth');
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create')->middleware('auth');
Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store')->middleware('auth');
Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit')->middleware('auth');
Route::put('/agenda/{id}', [AgendaController::class, 'update'])->name('agenda.update')->middleware('auth');
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy')->middleware('auth');

// Rute untuk atensi
Route::prefix('forms')->group(function () {
    Route::resource('atensi', AtensiController::class);
    Route::get('/atensi', [AtensiController::class, 'index'])->name('atensi.index');
    Route::get('/atensi/create', [AtensiController::class, 'create'])->name('forms.atensi.create');
    Route::post('/atensi/store', [AtensiController::class, 'store'])->name('atensi.store');
    Route::get('/atensi/{id}', [AtensiController::class, 'show'])->name('atensi.show'); // Menampilkan detail atensi
    Route::get('/atensi/{id}/edit', [AtensiController::class, 'edit'])->name('atensi.edit');
    Route::put('/atensi/{id}', [AtensiController::class, 'update'])->name('atensi.update');
    Route::delete('/atensi/{id}', [AtensiController::class, 'destroy'])->name('atensi.destroy');
});
// Rute untuk super_admin
Route::get('/super-admin/dashboard', [SuperAdminController::class, 'index'])->name('super_admin.dashboard')->middleware(['auth', 'role:super_admin']);

// Rute untuk admin
Route::get('/admin/super-admins', [UserController::class, 'showSuperAdmins'])->name('admin.superadmins')->middleware(['auth', 'role:admin']);

// Rute untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Mengarahkan ke halaman utama
})->name('logout');