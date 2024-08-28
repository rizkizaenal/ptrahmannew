@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Atensi</h2>
    <form action="{{ route('forms.atensi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="uraian_kegiatan" class="form-label">Uraian Kegiatan</label>
            <input type="text" class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" placeholder="isi uraian">
        </div>
        <div class="mb-3">
            <label for="saran_tindak_lanjut" class="form-label">Saran Tindak Lanjut</label>
            <input type="text" class="form-control" id="saran_tindak_lanjut" name="saran_tindak_lanjut" placeholder="isi saran">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="isi Keterangan"></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>
@endsection
