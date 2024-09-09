@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Atensi</h2>
    <form action="{{ route('atensi.update', $atensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="uraian_kegiatan">Uraian Kegiatan</label>
            <input type="text" name="uraian_kegiatan" id="uraian_kegiatan" class="form-control" value="{{ $atensi->uraian_kegiatan }}" required>
        </div>

        <div class="form-group">
            <label for="saran_tindak_lanjut">Saran Tindak Lanjut</label>
            <input type="text" name="saran_tindak_lanjut" id="saran_tindak_lanjut" class="form-control" value="{{ $atensi->saran_tindak_lanjut }}" required>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ $atensi->keterangan }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Atensi</button>
    </form>
</div>
@endsection
