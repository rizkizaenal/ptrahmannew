<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    // Menampilkan daftar agenda
    public function index()
    {
        $agendas = Agenda::all(); // Ambil semua data agenda
        return view('agenda.index', compact('agendas')); // Kirim data ke view
    }

    // Menyimpan agenda baru
    public function store(Request $request)
    {
        // Dump and Die untuk melihat data input
        dd($request->all());

        // Validasi data input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'acara_kegiatan' => 'required|string',
            'pakaian' => 'required|string', // Diperbaiki dari 'pakain'
            'tempat' => 'required|string',
            'diikuti_oleh' => 'required|string',
            'keterangan' => 'required|string',
            'link_surat' => 'required|url',
            'laporan_kegiatan' => 'required|string',
            'dokumen_data_pendukung' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan data ke database
        $agenda = new Agenda();
        $agenda->tanggal = $validatedData['tanggal'];
        $agenda->waktu = $validatedData['waktu'];
        $agenda->acara_kegiatan = $validatedData['acara_kegiatan'];
        $agenda->pakaian = $validatedData['pakaian']; // Diperbaiki dari 'pakain'
        $agenda->tempat = $validatedData['tempat'];
        $agenda->diikuti_oleh = $validatedData['diikuti_oleh'];
        $agenda->keterangan = $validatedData['keterangan'];
        $agenda->link_surat = $validatedData['link_surat'];
        $agenda->laporan_kegiatan = $validatedData['laporan_kegiatan'];

        if ($request->hasFile('dokumen_data_pendukung')) {
            $file = $request->file('dokumen_data_pendukung');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
            $agenda->dokumen_data_pendukung = '/storage/' . $filePath;
        }

        $agenda->save();

        // Redirect atau lakukan sesuatu setelah berhasil menyimpan
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil disimpan');
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
        // Validasi data (disamakan dengan validasi store)
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'acara_kegiatan' => 'required|string|max:255',
            'pakaian' => 'required|string|max:255', // Diperbaiki dari 'pakain'
            'tempat' => 'required|string|max:255',
            'diikuti_oleh' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'link_surat' => 'nullable|url',
            'laporan_kegiatan' => 'nullable|string',
            'dokumen_data_pendukung' => 'nullable|file|mimes:pdf,docx,jpg,png|max:2048', // Batasan ukuran 2MB
        ]);

        // Temukan agenda berdasarkan ID
        $agenda = Agenda::findOrFail($id);

        // Upload file dokumen jika ada file yang diunggah
        $dokumen = $agenda->dokumen_data_pendukung; // Simpan file lama jika tidak ada file baru
        if ($request->hasFile('dokumen_data_pendukung')) {
            // Hapus file lama jika ada file baru
            if ($dokumen && Storage::exists('public/' . $dokumen)) {
                Storage::delete('public/' . $dokumen);
            }
            // Upload file baru
            $dokumen = $request->file('dokumen_data_pendukung')->store('dokumen', 'public');
        }

        // Update data agenda
        $agenda->update([
            'tanggal' => Carbon::parse($validatedData['tanggal']),
            'waktu' => $validatedData['waktu'],
            'acara_kegiatan' => $validatedData['acara_kegiatan'],
            'pakaian' => $validatedData['pakaian'], // Diperbaiki dari 'pakain'
            'tempat' => $validatedData['tempat'],
            'diikuti_oleh' => $validatedData['diikuti_oleh'],
            'keterangan' => $validatedData['keterangan'],
            'link_surat' => $validatedData['link_surat'],
            'laporan_kegiatan' => $validatedData['laporan_kegiatan'],
            'dokumen_data_pendukung' => $dokumen,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Agenda berhasil diperbarui.');
    }

    // Menampilkan detail agenda
    public function show($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('agenda.show', compact('agenda'));
    }

    // Menghapus data agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }

    // Ekspor agenda ke PDF
    public function export()
    {
        // Ambil semua data agenda dari database
        $agendas = Agenda::all();

        // Load view 'agenda.export' dengan data agenda
        $pdf = PDF::loadView('agenda.export', compact('agendas'));

        // Download atau tampilkan PDF
        return $pdf->download('daftar-agenda.pdf');
        // return $pdf->stream(); // Untuk menampilkan di browser
    }

    // Menampilkan form create agenda
    public function create()
    {
        return view('agenda.create');
    }
}
