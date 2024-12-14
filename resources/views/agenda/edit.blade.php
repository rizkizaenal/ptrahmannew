@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Agenda</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $agenda->tanggal) }}" required>
        </div>

        <div class="form-group">
            <label for="waktu">Waktu</label>
            <input type="text" name="waktu" id="waktu" class="form-control" value="{{ old('waktu', $agenda->waktu) }}" required>
        </div>

        <div class="form-group">
            <label for="acara_kegiatan">Acara/Kegiatan</label>
            <input type="text" name="acara_kegiatan" id="acara_kegiatan" class="form-control" value="{{ old('acara_kegiatan', $agenda->acara_kegiatan) }}" required>
        </div>

        <div class="form-group">
            <label for="pakaian">Pakaian</label>
            <input type="text" name="pakaian" id="pakaian" class="form-control" value="{{ old('pakaian', $agenda->pakaian) }}" required>
        </div>

        <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" name="tempat" id="tempat" class="form-control" value="{{ old('tempat', $agenda->tempat) }}" required>
        </div>

        <div class="form-group">
            <label for="diikuti_oleh">Diikuti Oleh</label>
            <textarea name="diikuti_oleh" id="diikuti_oleh" class="form-control">{{ old('diikuti_oleh', $agenda->diikuti_oleh) }}</textarea>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $agenda->keterangan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="link_surat">Link Surat</label>
            <input type="url" name="link_surat" id="link_surat" class="form-control" value="{{ old('link_surat', $agenda->link_surat) }}">
        </div>

        <div class="form-group">
            <label for="laporan_kegiatan">Laporan Kegiatan</label>
            <textarea name="laporan_kegiatan" id="laporan_kegiatan" class="form-control">{{ old('laporan_kegiatan', $agenda->laporan_kegiatan) }}</textarea>
        </div>

        <div class="form-group">
    <label for="dokumen_data_pendukung">Dokumen Data Pendukung</label>
    <input type="file" name="dokumen_data_pendukung" id="dokumen_data_pendukung" class="form-control" accept="image/jpeg, image/png">
    @if ($agenda->dokumen_data_pendukung)
        <p><a href="{{ Storage::url($agenda->dokumen_data_pendukung) }}" target="_blank">Lihat Dokumen Lama</a></p>
    @endif
</div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
