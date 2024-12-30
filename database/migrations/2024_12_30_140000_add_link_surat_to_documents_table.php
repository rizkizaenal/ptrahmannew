<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkSuratToDocumentsTable extends Migration
{
    public function up()
{
    if (!Schema::hasColumn('documents', 'link_surat')) {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('link_surat')->nullable();
        });
    }
}

public function down()
{
    Schema::table('documents', function (Blueprint $table) {
        $table->dropColumn('link_surat');
    });
}

}
