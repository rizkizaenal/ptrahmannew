@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Atensi</h2>
    <form action="{{ route('atensi.update', $atensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="uraian_kegiatan">Uraian Kegiatan:</label>
            <input type="text" class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" value="{{ $atensi->uraian_kegiatan }}" required>
        </div>

        <div class="form-group">
            <label for="saran_tindak_lanjut">Saran Tindak Lanjut:</label>
            <input type="text" class="form-control" id="saran_tindak_lanjut" name="saran_tindak_lanjut" value="{{ $atensi->saran_tindak_lanjut }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $atensi->keterangan }}">
        </div>

        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
