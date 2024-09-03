<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_atensis_table.php

public function up()
{
    Schema::create('atensis', function (Blueprint $table) {
        $table->id();
        $table->string('uraian_kegiatan');
        $table->string('saran_tindak_lanjut');
        $table->text('keterangan')->nullable();
        $table->string('file')->nullable();
        $table->timestamps();
    });
}

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atensi');
    }
};
