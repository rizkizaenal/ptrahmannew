@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Daftar Agenda</h1>

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

    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Acara Kegiatan</th>
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
            @foreach($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->tanggal }}</td>
                    <td>{{ $agenda->waktu }}</td>
                    <td>{{ $agenda->acara_kegiatan }}</td>
                    <td>{{ $agenda->pakaian }}</td>
                    <td>{{ $agenda->tempat }}</td>
                    <td>{{ $agenda->diikuti_oleh }}</td>
                    <td>{{ $agenda->keterangan }}</td>
                    <td>
                        <a href="{{ $agenda->link_surat }}" target="_blank">Surat</a>
                    </td>
                    <td>
                        <a href="{{ $agenda->laporan_kegiatan }}" target="_blank">Laporan</a>
                    </td>
                    <td>
                        <a href="{{ $agenda->dokumen_pendukung }}" target="_blank">Dokumen</a>
                    </td>
                    <td>
                        <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus agenda ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection