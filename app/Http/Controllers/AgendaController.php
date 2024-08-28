<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Metode untuk menampilkan form input agenda
    public function create()
    {
        return view('agenda.create'); // Gantilah 'agenda.create' dengan nama view yang sesuai
    }

    // Metode untuk menyimpan data agenda
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Membuat entri baru di tabel agendas
        Agenda::create($validatedData);

        // Redirect ke halaman yang diinginkan
        return redirect()->route('agenda.index')->with('success', 'Agenda created successfully!');
    }
}
