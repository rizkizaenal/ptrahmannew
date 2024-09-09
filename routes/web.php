<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AtensiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rute untuk dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// routes/web.php
Route::prefix('atensi')->middleware('auth')->group(function () {Route::resource('atensi', AtensiController::class);
Route::get('/atensi/create', [AtensiController::class, 'create'])->name('forms.atensi.create');
Route::post('/atensi/destroy', [AtensiController::class, 'store'])->name('forms.atensi.store');
Route::get('/atensi', [AtensiController::class, 'index'])->name('atensi.index');
Route::get('/{id}/edit', [AtensiController::class, 'edit'])->name('atensi.edit');
Route::put('/{id}', [AtensiController::class, 'update'])->name('atensi.update');
Route::delete('/{id}', [AtensiController::class, 'destroy'])->name('atensi.destroy');
});

Route::prefix('atensi')->middleware('auth')->group(function () {
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
Route::get('/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
Route::put('/{id}', [AgendaController::class, 'update'])->name('agenda.update');
Route::delete('/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
});

// Rute khusus untuk super_admin
Route::middleware(['auth', 'role:super_admin'])->group(function () {
Route::get('/super-admin/dashboard', [SuperAdminController::class, 'index'])->middleware('super_admin');
});

// Rute khusus untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/admin/super-admins', [UserController::class, 'showSuperAdmins'])->name('admin.superadmins');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Mengarahkan ke halaman utama
})->name('logout');
