<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToAtensiTable extends Migration
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
            $table->timestamp('tanggal_waktu');
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
    
    
    public function down()
    {
        Schema::table('atensi', function (Blueprint $table) {
            $table->dropColumn('tanggal_waktu');
            $table->dropColumn('yth');
            $table->dropColumn('kegiatan');
            $table->dropColumn('pelaksanaan_kegiatan');
            $table->dropColumn('saran_tidak_lanjut');
            $table->dropColumn('penutup');
        });
    }
    }
