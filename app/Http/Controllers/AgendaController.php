<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar semua agenda dengan urutan terbaru di atas
    public function index()
    {
        // Ambil semua data agenda dari database dengan urutan terbaru di atas
        $agendas = Agenda::orderBy('created_at', 'desc')->get(); // Atau pakai 'id'

        // Tampilkan data ke view index
        return view('agenda.index', compact('agendas'));
    }

    // Menampilkan form untuk membuat agenda baru
    public function create()
    {
        return view('agenda.create');
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
        Agenda::create([
            'nama' => $validatedData['nama'],
            'keterangan' => $validatedData['keterangan'],
            'tanggal' => Carbon::parse($validatedData['tanggal']), // Konversi ke Carbon
        ]);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat!');
    }

    // Menampilkan form edit agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda'));
    }

    // Menyimpan perubahan data agenda
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Update data agenda
        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'nama' => $validatedData['nama'],
            'keterangan' => $validatedData['keterangan'],
            'tanggal' => Carbon::parse($validatedData['tanggal']), // Konversi ke Carbon
        ]);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diupdate!');
    }

    // Menampilkan detail agenda
    public function show($id)
    {
        // Ambil data berdasarkan ID
        $agenda = Agenda::find($id);
    
        // Kembalikan tampilan dengan data
        return view('agenda.show', compact('agenda'));
    }

    // Menghapus data agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
    public function export()
    {
        // Ambil semua data agenda dari database
        $agendas = Agenda::all();
    
        // Load view 'agenda.export' dengan data agenda
        $pdf = PDF::loadView('agenda.export', compact('agendas'));
    
        // Download atau tampilkan PDF
        return $pdf->download('daftar-agenda.pdf'); // Untuk download
        // return $pdf->stream(); // Untuk menampilkan di browser
    }
}