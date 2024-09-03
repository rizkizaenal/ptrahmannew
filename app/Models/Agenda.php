<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'tanggal',
    ];

    // Opsional: Jika Anda ingin mengatur nama tabel jika tidak mengikuti konvensi plural
    protected $table = 'agendas';
}
