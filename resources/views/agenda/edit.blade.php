@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agenda</h2>
    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Agenda</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $agenda->nama }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required>{{ $agenda->keterangan }}</textarea>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $agenda->tanggal->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Agenda</button>
    </form>
</div>
@endsection
