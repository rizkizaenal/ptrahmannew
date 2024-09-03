<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atensi;

class AtensiController extends Controller
{
    // Menampilkan daftar atensi
    public function index()
    {
        $data = Atensi::all(); // Mengambil semua data dari tabel 'atensi'
        return view('atensi.index', compact('data'));
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
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'uraian_kegiatan' => 'required|string|max:255',
            'saran_tindak_lanjut' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'file' => 'nullable|file|max:2048', // Maks 2MB
        ]);

        // Simpan file jika ada
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('atensi_files');
        }

        // Simpan data ke dalam tabel atensi
        $atensi = new Atensi();
        $atensi->uraian_kegiatan = $validatedData['uraian_kegiatan'];
        $atensi->saran_tindak_lanjut = $validatedData['saran_tindak_lanjut'];
        $atensi->keterangan = $validatedData['keterangan'];
        $atensi->file = $filePath;
        $atensi->save();

        // Redirect ke halaman yang diinginkan setelah penyimpanan
        return redirect()->route('atensi.index')->with('success', 'Data atensi berhasil disimpan.');
    }
}
