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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Uraian Kegiatan</th>
                <th>Saran Tindak Lanjut</th>
                <th>Keterangan</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $agenda->acara_kegiatan }}</td> <!-- Sesuaikan field ini -->
                <td>{{ $agenda->laporan_kegiatan }}</td> <!-- Sesuaikan field ini -->
                <td>{{ $agenda->keterangan }}</td>
                <td>
                    @if($agenda->dokumen_data_pendukung)
                    <a href="{{ $agenda->dokumen_data_pendukung }}" target="_blank">Download File</a> <!-- Sesuaikan penampilan file -->
                    @else
                    Tidak ada file
                    @endif
                </td>
                <td>
                    <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="back-button">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a> <!-- Sesuaikan route -->
    </div>

    <div class="export-button">
        <a href="{{ route('agenda.export') }}" class="btn btn-success">Export to PDF</a> <!-- Sesuaikan dengan PDF -->
    </div>
@endsection
