@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agenda</h2>
    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="acara_kegiatan">Acara Kegiatan</label>
            <input type="text" name="acara_kegiatan" id="acara_kegiatan" class="form-control" value="{{ $agenda->acara_kegiatan }}" required>
        </div>

        <div class="form-group">
            <label for="pakain">Pakaian</label>
            <input type="text" name="pakain" id="pakain" class="form-control" value="{{ $agenda->pakain }}" required>
        </div>

        <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" name="tempat" id="tempat" class="form-control" value="{{ $agenda->tempat }}" required>
        </div>

        <div class="form-group">
            <label for="diikuti_oleh">Diikuti Oleh</label>
            <input type="text" name="diikuti_oleh" id="diikuti_oleh" class="form-control" value="{{ $agenda->diikuti_oleh }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required>{{ $agenda->keterangan }}</textarea>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $agenda->tanggal->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="text" name="waktu" id="waktu" class="form-control" value="{{ $agenda->waktu }}" required>
        </div>

        <div class="form-group">
            <label for="link_surat">Link Surat</label>
            <input type="url" name="link_surat" id="link_surat" class="form-control" value="{{ $agenda->link_surat }}" required>
        </div>

        <div class="form-group">
            <label for="laporan_kegiatan">Laporan Kegiatan</label>
            <textarea name="laporan_kegiatan" id="laporan_kegiatan" class="form-control">{{ $agenda->laporan_kegiatan }}</textarea>
        </div>

        <div class="form-group">
            <label for="dokumen_data_pendukung">Dokumen Data Pendukung</label>
            <input type="file" name="dokumen_data_pendukung" id="dokumen_data_pendukung" class="form-control">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah dokumen.</small>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
    <button type="submit" class="btn btn-primary">Update Agenda</button>
    <a href="{{ route('agenda.index') }}" class="btn btn-secondary">Back</a> <!-- Ubah rute ke daftar agenda -->
</div>
    </form>
</div>
@endsection
