@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa; /* Warna latar belakang yang sama dengan agenda */
    }

    .form-container {
        max-width: 600px;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    label {
        font-weight: bold; /* Menebalkan label */
    }

    input[type="text"],
    input[type="datetime-local"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    button[type="submit"],
    button[type="reset"] {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    button[type="submit"]:hover,
    button[type="reset"]:hover {
        background-color: #0056b3; /* Warna saat hover */
    }

    .btn-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }
</style>

<div class="container mt-5">
    <div class="form-container">
        <h2>Atensi</h2>
        <form action="{{ route('atensi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
        <label for="tanggal_waktu">Tanggal/Waktu</label>
        <input type="datetime-local" name="tanggal_waktu" class="form-control" required>
    </div>

            <div class="mb-3">
                <label for="yth">Yth</label>
                <input type="text" name="yth" id="yth" required>
            </div>

            <div class="mb-3">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" name="kegiatan" id="kegiatan" required>
            </div>

            <div class="mb-3">
                <label for="pelaksanaan_kegiatan">Pelaksanaan Kegiatan</label>
                <input type="text" name="pelaksanaan_kegiatan" id="pelaksanaan_kegiatan" required>
            </div>

            <div class="mb-3">
                <label for="uraian_kegiatan">Uraian Kegiatan</label>
                <textarea name="uraian_kegiatan" id="uraian_kegiatan" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="saran_tindak_lanjut">Saran Tindak Lanjut</label>
                <textarea name="saran_tindak_lanjut" id="saran_tindak_lanjut" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="penutup">Penutup</label>
                <input type="text" name="penutup" id="penutup" required>
            </div>

            <div class="mb-3">
                <label for="file">Upload File</label>
                <input type="file" name="file" id="file">
            </div>

            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn bg-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
