<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id (primary key)
            $table->date('tanggal'); // Kolom tanggal
            $table->string('waktu'); // Kolom waktu
            $table->string('acara_kegiatan'); // Kolom acara_kegiatan
            $table->string('pakaian'); // Kolom pakaian
            $table->string('tempat'); // Kolom tempat
            $table->string('diikuti_oleh'); // Kolom diikuti_oleh
            $table->text('keterangan'); // Kolom keterangan
            $table->string('link_surat'); // Kolom link_surat
            $table->text('laporan_kegiatan'); // Kolom laporan_kegiatan
            $table->string('dokumen_data_pendukung')->nullable(); // Kolom dokumen_data_pendukung
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
