<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AtensiController;
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


Route::get('/atensi/create', [AtensiController::class, 'create'])->name('forms.atensi.create');
Route::post('/atensi', [AtensiController::class, 'store'])->name('forms.atensi.store');
Route::get('/atensi', [AtensiController::class, 'index'])->name('atensi.index');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');