@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Atensi</h2>
    <!-- Tombol Buat Atensi -->
    <a href="{{ route('forms.atensi.create') }}" class="btn btn-secondary mb-3">Buat Atensi</a>

    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Custom CSS -->
    <style>
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #d6d8db;
        }
        .alert-success {
            margin-top: 20px;
        }
        .back-button, .export-button {
            position: fixed;
            bottom: 20px;
        }
        .back-button {
            right: 20px;
        }
        .export-button {
            left: 20px;
        }
    </style>

    <!-- Tabel Daftar Atensi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal/Waktu</th>
                <th>Yth</th>
                <th>Kegiatan</th>
                <th>Pelaksanaan Kegiatan</th>
                <th>Uraian Kegiatan</th>
                <th>Saran Tindak Lanjut</th>
                <th>Penutup</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $atensi)
                <tr>
                    <!-- Format tanggal dan waktu -->
                    <td>{{ \Carbon\Carbon::parse($atensi->tanggal_waktu)->format('d-m-Y H:i') }}</td>
                    <td>{{ $atensi->yth }}</td>
                    <td>{{ $atensi->kegiatan }}</td>
                    <td>{{ $atensi->pelaksanaan_kegiatan }}</td>
                    <td>{{ $atensi->uraian_kegiatan }}</td>
                    <td>{{ $atensi->saran_tindak_lanjut }}</td>
                    <td>{{ $atensi->penutup }}</td>
                    <td>
                        @if($atensi->file)
                            <a href="{{ asset('storage/' . $atensi->file) }}" target="_blank">Download</a>
                        @endif
                    </td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('atensi.edit', $atensi->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('atensi.destroy', $atensi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
