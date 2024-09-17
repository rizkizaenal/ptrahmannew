<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan middleware auth digunakan
    }

    // Menampilkan daftar semua agenda
    public function index()
    {
        // Ambil semua data agenda dari database
        $agendas = Agenda::all();

        // Tampilkan data ke view index
        return view('agenda.index', compact('agendas')); // Sesuaikan dengan nama view Anda
    }

    // Menampilkan form untuk membuat agenda baru
    public function create()
    {
        return view('agenda.create'); // Sesuaikan dengan nama view Anda
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

        // Konversi string tanggal ke objek Carbon
        $tanggal = Carbon::parse($validatedData['tanggal']);

        // Simpan data agenda
        Agenda::create([
            'nama' => $validatedData['nama'],
            'keterangan' => $validatedData['keterangan'],
            'tanggal' => $tanggal,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Agenda created successfully!');
    }

    // Menampilkan form edit agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.edit', compact('agenda')); // Sesuaikan dengan view edit Anda
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

        // Konversi string tanggal ke objek Carbon
        $tanggal = Carbon::parse($validatedData['tanggal']);

        // Update data agenda
        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'nama' => $validatedData['nama'],
            'keterangan' => $validatedData['keterangan'],
            'tanggal' => $tanggal,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Agenda updated successfully!');
    }

    // Menghapus data agenda
    public function destroy($id)
    {
        // Hapus agenda berdasarkan ID
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('agenda.index')->with('success', 'Agenda deleted successfully!');
    }
}
