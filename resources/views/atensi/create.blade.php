@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #fff; /* Warna latar belakang yang mirip dengan agenda */
    }

    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-primary:hover, .btn-secondary:hover {
        opacity: 0.9;
    }

    .mb-3 {
        margin-bottom: 16px;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="form-container">
        <h2>Atensi</h2>
        {{-- Form untuk input atensi --}}
        <form action="{{ route('atensi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="uraian_kegiatan" class="form-label">Uraian Kegiatan</label>
                <input type="text" class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" placeholder="Isi uraian kegiatan" required>
            </div>
            <div class="mb-3">
                <label for="saran_tindak_lanjut" class="form-label">Saran Tindak Lanjut</label>
                <input type="text" class="form-control" id="saran_tindak_lanjut" name="saran_tindak_lanjut" placeholder="Isi saran tindak lanjut" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Isi keterangan" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
