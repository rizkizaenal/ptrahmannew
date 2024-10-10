<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agenda;
use Carbon\Carbon;

class HapusAgendaLama extends Command
{
    protected $signature = 'agenda:hapus-lama';
    protected $description = 'Menghapus agenda yang lebih dari 1 tahun';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $satuTahunLalu = Carbon::now()->subYear();
        
        Agenda::where('tanggal', '<', $satuTahunLalu)->delete();
        
        $this->info('Agenda lama berhasil dihapus.');
    }
}
