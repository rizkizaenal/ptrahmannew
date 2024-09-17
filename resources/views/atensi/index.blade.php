@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Atensi</h2>
    <a href="{{ route('forms.atensi.create') }}" class="btn btn-secondary mb-3">Buat Atensi</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Uraian Kegiatan</th>
                <th>Saran Tindak Lanjut</th>
                <th>Keterangan</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $atensi)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $atensi->uraian_kegiatan }}</td>
                <td>{{ $atensi->saran_tindak_lanjut }}</td>
                <td>{{ $atensi->keterangan }}</td>
                <td>
                    @if($atensi->file)
                        <a href="{{ asset('storage/' . $atensi->file) }}" target="_blank">Lihat File</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
                <td>
    <!-- Tombol Edit -->
    <a href="{{ route('atensi.edit', $atensi->id) }}" class="btn btn-warning" style="display: inline-block; margin-right: 5px;">Edit</a>

    <!-- Tombol Hapus -->
    <form action="{{ route('atensi.destroy', $atensi->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
