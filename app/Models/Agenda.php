<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'tanggal', 
        'waktu', 
        'acara_kegiatan', 
        'pakaian', 
        'tempat', 
        'diikuti_oleh', 
        'keterangan', 
        'link_surat', 
        'laporan_kegiatan', 
        'dokumen_data_pendukung'
    ];

    protected $table = 'Agendas';

    // Mengkonversi kolom 'tanggal' menjadi objek Carbon
    protected $dates = ['tanggal'];

    // Atau bisa menggunakan casts
    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
