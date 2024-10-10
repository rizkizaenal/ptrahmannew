<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AgendaController extends Controller
{
    // Menampilkan daftar agenda
    public function index()
    {
        $agendas = Agenda::orderBy('tanggal', 'desc')->paginate(10);
        return view('agenda.index', compact('agendas'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'acara_kegiatan' => 'required|string',
            'pakaian' => 'required|string',
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
        $agenda->pakaian = $validatedData['pakaian'];
        $agenda->tempat = $validatedData['tempat'];
        $agenda->diikuti_oleh = $validatedData['diikuti_oleh'];
        $agenda->keterangan = $validatedData['keterangan'];
        $agenda->link_surat = $validatedData['link_surat'];
        $agenda->laporan_kegiatan = $validatedData['laporan_kegiatan'];
    
        // Proses upload file
        if ($request->hasFile('dokumen_data_pendukung')) {
            $file = $request->file('dokumen_data_pendukung');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $filename, 'public');
            $agenda->dokumen_data_pendukung = '/storage/' . $filePath;
        }
    
        // Simpan data agenda
        $agenda->save();
    
        // Redirect ke daftar agenda dengan pesan sukses
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
        // Validasi data
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'acara_kegiatan' => 'required|string|max:255',
            'pakaian' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'diikuti_oleh' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'link_surat' => 'nullable|url',
            'laporan_kegiatan' => 'nullable|string',
            'dokumen_data_pendukung' => 'nullable|file|mimes:pdf,docx,jpg,png|max:2048',
        ]);

        // Temukan agenda berdasarkan ID
        $agenda = Agenda::findOrFail($id);

        // Upload file dokumen jika ada file baru
        $dokumen = $agenda->dokumen_data_pendukung;
        if ($request->hasFile('dokumen_data_pendukung')) {
            if ($dokumen && Storage::exists('public/' . $dokumen)) {
                Storage::delete('public/' . $dokumen);
            }
            $dokumen = $request->file('dokumen_data_pendukung')->store('dokumen', 'public');
        }

        // Update data agenda
        $agenda->update([
            'tanggal' => $validatedData['tanggal'],
            'waktu' => $validatedData['waktu'],
            'acara_kegiatan' => $validatedData['acara_kegiatan'],
            'pakaian' => $validatedData['pakaian'],
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
        if ($agenda->dokumen_data_pendukung && Storage::exists('public/' . $agenda->dokumen_data_pendukung)) {
            Storage::delete('public/' . $agenda->dokumen_data_pendukung);
        }
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }

    // Ekspor agenda ke PDF
    public function export()
    {
        // Ambil semua data agenda
        $agendas = Agenda::all();

        // Load view untuk export ke PDF
        $pdf = PDF::loadView('agenda.export', compact('agendas'));

        // Download file PDF
        return $pdf->download('daftar-agenda.pdf');
    }

    // Menampilkan form create agenda
    public function create()
    {
        return view('agenda.create');
    }
    public function hapusAgendaLama()
{
    $oneYearAgo = Carbon::now()->subYear();
    
    // Hapus agenda yang lebih tua dari 1 tahun
    Agenda::where('tanggal', '<', $oneYearAgo)->delete();
}
}
