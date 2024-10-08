@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
@endsection

<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Acara Kegiatan</th>
            <th>Tempat</th>
            <th>Pakaian</th>
            <th>Keterangan</th>
            <th>Dokumen Pendukung</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agendas as $agenda)
            <tr>
                <td>{{ $agenda->tanggal }}</td>
                <td>{{ $agenda->waktu }}</td>
                <td>{{ $agenda->acara_kegiatan }}</td>
                <td>{{ $agenda->tempat }}</td>
                <td>{{ $agenda->pakaian }}</td>
                <td>{{ $agenda->keterangan }}</td>
                <td>
                    @if($agenda->dokumen_data_pendukung)
                        <a href="{{ asset('storage/'.$agenda->dokumen_data_pendukung) }}" target="_blank">Lihat Dokumen</a>
                    @else
                        Tidak ada dokumen
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
