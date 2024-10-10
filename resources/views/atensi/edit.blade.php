@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Atensi</h2>
    <form action="{{ route('atensi.update', $atensi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal_waktu">Tanggal/Waktu:</label>
            <input type="datetime-local" name="tanggal_waktu" id="tanggal_waktu" required>
            </div>
<div>
    <label for="yth">Yth</label>
    <input type="text" name="yth" id="yth" required>
</div>
<div>
    <label for="kegiatan">Kegiatan</label>
    <input type="text" name="kegiatan" id="kegiatan" required>
</div>
<div>
    <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan</label>
    <input type="text" name="pelaksanaan_kegiatan" id="pelaksanaan_kegiatan" required>
</div>
<div>
    <label for="uraian_kegiatan">Uraian Kegiatan</label>
    <textarea name="uraian_kegiatan" id="uraian_kegiatan" required></textarea>
</div>
<div>
    <label for="saran_tindak_lanjut">Saran Tindak Lanjut</label>
    <textarea name="saran_tindak_lanjut" id="saran_tindak_lanjut" required></textarea>
</div>
<div>
    <label for="penutup">Penutup</label>
    <input type="text" name="penutup" id="penutup" required>
</div>
<div>
    <label for="file">Upload File</label>
    <input type="file" name="file" id="file">
</div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
