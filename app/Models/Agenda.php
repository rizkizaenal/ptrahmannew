<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',          // Perbarui dengan nama kolom yang benar
        'tanggal',       // Perbarui dengan nama kolom yang benar
        'keterangan',    // Perbarui dengan nama kolom yang benar
    ];

    // Opsional: Jika Anda ingin mengatur nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'agendas';
}
