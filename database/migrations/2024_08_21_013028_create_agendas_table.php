<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Hari/Tanggal
            $table->time('waktu'); // Waktu/Jam
            $table->string('acara_kegiatan'); // Acara Kegiatan
            $table->string('pakaian'); // Pakaian
            $table->string('tempat'); // Tempat
            $table->string('diikuti_oleh'); // Diikuti Oleh
            $table->text('keterangan'); // Keterangan
            $table->string('link_surat')->nullable(); // Link Surat
            $table->text('laporan_kegiatan')->nullable(); // Laporan Kegiatan
            $table->string('dokumen_data_pendukung')->nullable(); // Dokumen Data Pendukung
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
