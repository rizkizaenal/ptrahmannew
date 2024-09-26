@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Atensi</h1>

    <div class="card">
        <div class="card-body">
            <!-- Menampilkan informasi detail dari atensi -->
            <h5 class="card-title"><strong>Judul: </strong>{{ $atensi->judul }}</h5>
            <p class="card-text"><strong>Deskripsi: </strong>{{ $atensi->deskripsi }}</p>
            <p class="card-text"><strong>Tanggal: </strong>{{ $atensi->tanggal }}</p>
            <p class="card-text"><strong>Status: </strong>{{ $atensi->status }}</p>
        </div>
    </div>
    <a href="{{ route('forms.atensi.create') }}" class="btn btn-primary">Tambah Atensi</a>

    <a href="{{ route('atensi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
