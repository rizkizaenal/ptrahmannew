@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail {{ ucfirst($type) }}</h1>
        
        <div class="card">
            <div class="card-header">
                <h4>
                    @if($type === 'agenda')
                        {{ $data->acara_kegiatan }}
                    @else
                        {{ $data->kegiatan }}
                    @endif
                </h4>
            </div>
            <div class="card-body">
                @if($type === 'agenda')
                    <p><strong>Tanggal:</strong> {{ $data->tanggal }}</p>
                    <p><strong>Waktu:</strong> {{ $data->waktu }}</p>
                    <p><strong>Pakaian:</strong> {{ $data->pakaian }}</p>
                    <p><strong>Tempat:</strong> {{ $data->tempat }}</p>
                    <p><strong>Diikuti Oleh:</strong> {{ $data->diikuti_oleh }}</p>
                    <p><strong>Keterangan:</strong> {{ $data->keterangan }}</p>
                    <p><strong>Link Surat:</strong> <a href="{{ $data->link_surat }}">{{ $data->link_surat }}</a></p>
                    <p><strong>Laporan Kegiatan:</strong> {{ $data->laporan_kegiatan }}</p>
                    <p><strong>Dokumen Data Pendukung:</strong> {{ $data->dokumen_data_pendukung }}</p>
                @else
                    <p><strong>Tanggal & Waktu:</strong> {{ $data->tanggal_waktu }}</p>
                    <p><strong>Yth:</strong> {{ $data->yth }}</p>
                    <p><strong>Pelaksanaan Kegiatan:</strong> {{ $data->pelaksanaan_kegiatan }}</p>
                    <p><strong>Uraian Kegiatan:</strong> {{ $data->uraian_kegiatan }}</p>
                    <p><strong>Saran Tindak Lanjut:</strong> {{ $data->saran_tindak_lanjut }}</p>
                    <p><strong>Penutup:</strong> {{ $data->penutup }}</p>
                    <p><strong>File:</strong> <a href="{{ $data->file }}">{{ $data->file }}</a></p>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('super_admin.dashboard') }}" class="btn btn-primary px-4 back-button">Back</a> <!-- Menambahkan kelas back-button -->
    </div>
@endsection

