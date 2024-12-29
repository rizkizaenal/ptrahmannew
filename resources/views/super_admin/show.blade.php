@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Detail {{ ucfirst($type) }}</h1>

        <div class="card shadow-lg">
            <div class="card-header bg-secondary text-white text-center">
                <h4 class="mb-0">
                    @if($type === 'agenda')
                        {{ $data->acara_kegiatan }}
                    @else
                        {{ $data->kegiatan }}
                    @endif
                </h4>
            </div>
            <div class="card-body">
                @if($type === 'agenda')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tanggal:</strong> {{ $data->tanggal }}</li>
                        <li class="list-group-item"><strong>Waktu:</strong> {{ $data->waktu }}</li>
                        <li class="list-group-item"><strong>Pakaian:</strong> {{ $data->pakaian }}</li>
                        <li class="list-group-item"><strong>Tempat:</strong> {{ $data->tempat }}</li>
                        <li class="list-group-item"><strong>Diikuti Oleh:</strong> {{ $data->diikuti_oleh }}</li>
                        <li class="list-group-item"><strong>Keterangan:</strong> {{ $data->keterangan }}</li>
                        <li class="list-group-item"><strong>Link Surat:</strong> <a href="{{ $data->link_surat }}" target="_blank">{{ $data->link_surat }}</a></li>
                        <li class="list-group-item"><strong>Laporan Kegiatan:</strong> {{ $data->laporan_kegiatan }}</li>
                        <li class="list-group-item"><strong>Dokumen Data Pendukung:</strong> {{ $data->dokumen_data_pendukung }}</li>
                    </ul>
                @else
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Tanggal & Waktu:</strong> {{ $data->tanggal_waktu }}</li>
                        <li class="list-group-item"><strong>Yth:</strong> {{ $data->yth }}</li>
                        <li class="list-group-item"><strong>Pelaksanaan Kegiatan:</strong> {{ $data->pelaksanaan_kegiatan }}</li>
                        <li class="list-group-item"><strong>Uraian Kegiatan:</strong> {{ $data->uraian_kegiatan }}</li>
                        <li class="list-group-item"><strong>Saran Tindak Lanjut:</strong> {{ $data->saran_tindak_lanjut }}</li>
                        <li class="list-group-item"><strong>Penutup:</strong> {{ $data->penutup }}</li>
                        <li class="list-group-item"><strong>File:</strong> <a href="{{ $data->file }}" target="_blank">{{ $data->file }}</a></li>
                    </ul>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('super_admin.dashboard') }}" class="btn btn-primary px-4 back-button">
                <i class="bi bi-arrow-left-circle"></i> Back
            </a>
        </div>
    </div>
@endsection
