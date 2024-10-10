@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Agenda</h1>
    <a href="{{ route('agenda.create') }}" class="btn btn-secondary mb-3">Buat Agenda</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>
        /* Custom CSS for this page */
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

<table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Acara/Kegiatan</th>
                    <th>Pakaian</th>
                    <th>Tempat</th>
                    <th>Diikuti Oleh</th>
                    <th>Keterangan</th>
                    <th>Link Surat</th>
                    <th>Laporan Kegiatan</th>
                    <th>Dokumen Pendukung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agendas as $agenda)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $agenda->waktu }}</td>
                        <td>{{ $agenda->acara_kegiatan }}</td>
                        <td>{{ $agenda->pakaian }}</td>
                        <td>{{ $agenda->tempat }}</td>
                        <td>{{ $agenda->diikuti_oleh }}</td>
                        <td>{{ $agenda->keterangan }}</td>
                        <td><a href="{{ $agenda->link_surat }}" target="_blank">Lihat Surat</a></td>
                        <td>{{ $agenda->laporan_kegiatan }}</td>
                        <td>
                            @if($agenda->dokumen_data_pendukung)
                                <a href="{{ asset($agenda->dokumen_data_pendukung) }}" target="_blank">Download</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data agenda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3">
    <a href="{{ route('index') }}" class="btn btn-primary px-4 mr-3">Back</a>
</div>
@endsection
