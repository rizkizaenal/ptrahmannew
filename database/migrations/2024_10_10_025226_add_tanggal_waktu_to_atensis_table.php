<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalWaktuToAtensisTable extends Migration
{
    public function up()
    {
        Schema::table('atensis', function (Blueprint $table) {
            $table->dateTime('tanggal_waktu')->nullable(); // Menambahkan kolom tanggal_waktu
        });
    }

    public function down()
    {
        Schema::table('atensis', function (Blueprint $table) {
            $table->dropColumn('tanggal_waktu'); // Menghapus kolom jika rollback
        });
    }
}
