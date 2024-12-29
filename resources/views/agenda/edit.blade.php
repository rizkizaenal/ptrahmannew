@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        .edit-agenda-wrapper {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 30px;
        }

        .edit-agenda-wrapper h1 {
            font-size: 2rem;
            color: #000;
            margin-bottom: 20px;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button.btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        .old-document-link {
            color: #007bff;
            text-decoration: underline;
        }

        .old-document-link:hover {
            color: #0056b3;
            text-decoration: none;
        }
    </style>

    <div class="edit-agenda-wrapper">
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

        <form action="{{ route('agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data" class="agenda-form">
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
                    <p><a href="{{ Storage::url($agenda->dokumen_data_pendukung) }}" target="_blank" class="old-document-link">Lihat Dokumen Lama</a></p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
