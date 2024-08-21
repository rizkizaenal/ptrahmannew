<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
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

// routes/web.php
Route::resource('agenda', AgendaController::class);
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');

    // Rute untuk halaman index
 
// Mengarahkan pengguna ke dashboard setelah login
