<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atensi; // Pastikan model ini sudah ada jika diperlukan

class AtensiController extends Controller
{
    // Menampilkan daftar atensi
    public function index()
    {
        // Ambil data dari model Atensi
        $data = Atensi::all(); // Mengambil semua data dari tabel 'atensi'

        // Kirim data ke view 'atensi.index'
        return view('atensi.index', compact('data'));
    }

    // Menyimpan data atensi
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data ke dalam tabel atensi
        $atensi = new Atensi();
        $atensi->nama = $validatedData['nama'];
        $atensi->deskripsi = $validatedData['deskripsi'];
        $atensi->save();

        // Redirect ke halaman yang diinginkan setelah penyimpanan
        return redirect()->route('forms.atensi')->with('success', 'Data atensi berhasil disimpan.');
    }
}
