@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Atensi</h2>
    <!-- Tombol Buat Atensi -->
    <a href="{{ route('atensi.create') }}" class="btn btn-secondary mb-3">Buat Atensi</a>


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
        .fixed-back-button {
    position: fixed; /* Posisi tetap di layar */
    bottom: 20px;    /* Jarak dari bawah layar */
    right: 20px;     /* Jarak dari kanan layar */
    z-index: 1000;   /* Pastikan berada di atas elemen lain */
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
                <th scope="col" style="width: 15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $atensi)
                <tr>
                    <td>{{ $atensi->tanggal_waktu }}</td> <!-- Perbaiki kolom tanggal_waktu -->
                    <td>{{ $atensi->yth }}</td>                 
                    <td>{{ $atensi->kegiatan }}</td>
                    <td>{{ $atensi->pelaksanaan_kegiatan }}</td>
                    <td>{{ $atensi->uraian_kegiatan }}</td>
                    <td>{{ $atensi->saran_tindak_lanjut }}</td>
                    <td>{{ $atensi->penutup }}</td>
                    <td>
                        @if($atensi->file)
                        <a href="{{ asset($atensi->file) }}" target="_blank" class="btn btn-secondary btn-sm">Download</a>
                              @endif
                    </td>
                    <td>
                        <a href="{{ route('atensi.edit', $atensi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('atensi.destroy', $atensi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delet</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end mt-3">
    @if(Auth::user()->role == 'user')
        <a href="{{ route('dashboard') }}" class="btn btn-primary px-4 back-button fixed-back-button">Back</a>
    @elseif(Auth::user()->role == 'super_admin')
        <a href="{{ route('super_admin.dashboard') }}" class="btn btn-primary px-4 back-button fixed-back-button">Back</a>
    @endif
</div>
@endsection
