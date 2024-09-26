<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['nama', 'keterangan', 'tanggal'];

    // Mengkonversi kolom 'tanggal' menjadi objek Carbon
    protected $dates = ['tanggal'];

    // Atau bisa menggunakan casts
    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
