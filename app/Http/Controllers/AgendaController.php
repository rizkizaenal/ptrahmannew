<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda; // Pastikan model Agenda sudah dibuat

class AgendaController extends Controller
{
    /**
     * Store a newly created agenda in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'description' => 'required',
            'date'        => 'required|date',
        ]);

        // Simpan data ke database
        Agenda::create($validatedData);

        // Redirect ke halaman yang sesuai, misalnya ke daftar agenda
        return redirect()->route('agenda.index')->with('success', 'Agenda created successfully.');
    }
}
