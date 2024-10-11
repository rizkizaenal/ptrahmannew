<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atensis', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_waktu')->nullable(); // Menggunakan dateTime untuk tanggal dan waktu
            $table->string('yth');
            $table->string('kegiatan');
            $table->string('pelaksanaan_kegiatan');
            $table->text('uraian_kegiatan');
            $table->string('saran_tindak_lanjut');
            $table->text('penutup')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atensis');
    }
}
