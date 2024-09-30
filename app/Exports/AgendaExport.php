<?php

namespace App\Exports;

use App\Models\Agenda;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class AgendaExport
{
    public function export()
    {
        // Membuat objek PHPWord
        $phpWord = new PhpWord();
        
        // Menambahkan halaman baru
        $section = $phpWord->addSection();

        // Menambahkan judul
        $section->addTitle('Agenda', 1);

        // Mengambil semua data agenda
        $agendas = Agenda::all();

        // Menambahkan tabel
        $table = $section->addTable();

        // Menambahkan header tabel
        $table->addRow();
        $table->addCell(2000)->addText('ID');
        $table->addCell(4000)->addText('Nama Agenda');
        $table->addCell(4000)->addText('Keterangan');
        $table->addCell(4000)->addText('Tanggal');

        // Menambahkan data ke tabel
        foreach ($agendas as $agenda) {
            $table->addRow();
            $table->addCell(2000)->addText($agenda->id);
            $table->addCell(4000)->addText($agenda->nama);
            $table->addCell(4000)->addText($agenda->keterangan);
            $table->addCell(4000)->addText($agenda->tanggal->format('d-m-Y')); // Format tanggal
        }

        // Menyimpan file
        $filePath = public_path('agendas.docx');
        $phpWord->save($filePath, 'Word2007');

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

}
Route::get('/export-agenda', function () {
    $export = new AgendaExport();
    return $export->export();
});