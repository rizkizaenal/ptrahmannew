@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Atensi</h2>
    <form action="{{ route('atensi.update', $atensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tanggal_waktu">Tanggal/Waktu:</label>
            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" 
                   value="{{ old('tanggal_waktu', $atensi->tanggal_waktu) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="yth">Yth:</label>
            <input type="text" name="yth" id="yth" 
                   value="{{ old('yth', $atensi->yth) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="kegiatan">Kegiatan:</label>
            <input type="text" name="kegiatan" id="kegiatan" 
                   value="{{ old('kegiatan', $atensi->kegiatan) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan:</label>
            <input type="text" name="pelaksanaan_kegiatan" id="pelaksanaan_kegiatan" 
                   value="{{ old('pelaksanaan_kegiatan', $atensi->pelaksanaan_kegiatan) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="uraian_kegiatan">Uraian Kegiatan:</label>
            <textarea name="uraian_kegiatan" id="uraian_kegiatan" required class="form-control">{{ old('uraian_kegiatan', $atensi->uraian_kegiatan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="saran_tindak_lanjut">Saran Tindak Lanjut:</label>
            <textarea name="saran_tindak_lanjut" id="saran_tindak_lanjut" required class="form-control">{{ old('saran_tindak_lanjut', $atensi->saran_tindak_lanjut) }}</textarea>
        </div>

        <div class="form-group">
            <label for="penutup">Penutup:</label>
            <input type="text" name="penutup" id="penutup" 
                   value="{{ old('penutup', $atensi->penutup) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" name="file" id="file" class="form-control">
            @if($atensi->file)
                <p>File yang diupload: <a href="{{ Storage::url($atensi->file) }}">{{ basename($atensi->file) }}</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
