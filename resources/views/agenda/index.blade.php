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
    </style>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Agenda</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $index => $agenda)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $agenda->nama }}</td>
                    <td>{{ $agenda->keterangan }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
