<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Menampilkan form untuk membuat agenda baru
    public function create()
    {
        return view('agenda.create'); // Sesuaikan dengan nama view Anda
    }



    public function __construct()
    {
        $this->middleware('auth'); // Pastikan middleware guest digunakan
    }
    // Menyimpan data agenda baru
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simpan data agenda
        Agenda::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Agenda created successfully!');
    }

    // Menampilkan daftar semua agenda
    public function index()
    {
        // Ambil semua data agenda dari database
        $agendas = Agenda::all();

        // Tampilkan data ke view index
        return view('agenda.index', compact('agendas')); // Sesuaikan dengan nama view Anda
    }
}
