{{-- atensi/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Detail Atensi</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Atensi
        </div>
        <div class="card-body">
            <p><strong>Uraian Kegiatan:</strong> {{ $atensi->uraian_kegiatan }}</p>
            <p><strong>Saran Tindak Lanjut:</strong> {{ $atensi->saran_tindak_lanjut }}</p>
            <p><strong>Keterangan:</strong> {{ $atensi->keterangan ?? 'Tidak ada keterangan' }}</p>
            @if($atensi->file)
                <p><strong>File:</strong> <a href="{{ asset('storage/' . $atensi->file) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Dashboard</a>
</div>
@endsection
