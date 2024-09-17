<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'keterangan',
        'tanggal',
    ];

    // Mengatur akses tanggal sebagai objek Carbon
    protected $dates = ['tanggal'];

    // Atau, jika kamu ingin mengonversi format tanggal sebelum disimpan
    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = Carbon::parse($value);
    }

    // Atau, jika kamu ingin format tanggal khusus saat diambil
    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
