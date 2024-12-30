<?php

namespace App\Http\Controllers;

use App\Models\Atensi;
use App\Models\User;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Menghitung jumlah data
        $agendaCount = Agenda::count();
        $atensiCount = Atensi::count();
        $userCount = User::count();

        // Mengambil semua data agenda
        $agendas = Agenda::all();

        // Kirim semua data ke view
        return view('admin.dashboard', compact('agendaCount', 'atensiCount', 'userCount', 'agendas'));
    }
}
?>
