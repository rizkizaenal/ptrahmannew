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
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->nama }}</td>
                    <td>{{ $agenda->keterangan }}</td>
                    <td>{{ $agenda->tanggal->format('d-m-Y') }}</td> <!-- Pastikan tanggal sudah berupa objek Carbon -->
                    <td>
                        <a href="{{ route('agenda.edit', $agenda->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="back-button">
        <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
    </div>

    <div class="export-button">
        <a href="{{ route('agenda.export') }}" class="btn btn-success">Export to Word</a>

    </div>
@endsection