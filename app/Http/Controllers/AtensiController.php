<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atensi;
use Exception;

class AtensiController extends Controller
{
    // Menampilkan daftar atensi
    public function index()
    {
        $atensi = Atensi::all(); // Mengambil semua data dari tabel 'atensi'
        return view('atensi.index', compact('atensi'));
    }
    public function show($id)
    {
        // Temukan data berdasarkan ID
        $atensi = Atensi::find($id);
    
        // Jika data tidak ditemukan, arahkan kembali atau tampilkan pesan error
        if (!$atensi) {
            return redirect()->route('atensi.index')->with('error', 'Data tidak ditemukan');
        }
    
        // Kembalikan view dengan data atensi
        return view('atensi.show', compact('atensi'));
    }
            

    public function __construct()
    {
        $this->middleware('auth'); // Pastikan middleware guest digunakan
    }

    // Menampilkan form untuk membuat atensi baru
    public function create()
    {
        return view('atensi.create');
    }

    // Menyimpan data atensi
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'uraian_kegiatan' => 'required|string|max:255',
            'saran_tindak_lanjut' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
        ]);

        try {
            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('atensi_files');
            }

            $atensi = new Atensi();
            $atensi->uraian_kegiatan = $validatedData['uraian_kegiatan'];
            $atensi->saran_tindak_lanjut = $validatedData['saran_tindak_lanjut'];
            $atensi->keterangan = $validatedData['keterangan'] ?? null;
            $atensi->file = $filePath;
            $atensi->save();

            return redirect()->route('atensi.index')->with('success', 'Data atensi berhasil disimpan.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
        }
    }

    // Menampilkan form edit atensi
    public function edit($id)
    {
        $atensi = Atensi::findOrFail($id);
        return view('atensi.edit', compact('atensi'));
    }

    // Menyimpan perubahan data atensi yang sudah diedit
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'uraian_kegiatan' => 'required|string|max:255',
            'saran_tindak_lanjut' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
        ]);

        try {
            $atensi = Atensi::findOrFail($id);

            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('atensi_files');
                $atensi->file = $filePath;
            }

            $atensi->uraian_kegiatan = $validatedData['uraian_kegiatan'];
            $atensi->saran_tindak_lanjut = $validatedData['saran_tindak_lanjut'];
            $atensi->keterangan = $validatedData['keterangan'] ?? null;
            $atensi->save();

            return redirect()->route('atensi.index')->with('success', 'Data atensi berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage()]);
        }    
    }
    

    // Menghapus data atensi
    public function destroy($id)
    {
        try {
            $atensi = Atensi::findOrFail($id);
            $atensi->delete();

            return redirect()->route('atensi.index')->with('success', 'Data atensi berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()]);
        }
    }
}


