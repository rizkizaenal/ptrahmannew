<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Agenda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Agenda</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Acara Kegiatan</th>
                <th>Tanggal</th>
                <th>Pakaian</th>
                <th>Tempat</th>
                <th>Diikuti Oleh</th>
                <th>Keterangan</th>
                <th>Link Surat</th>
                <th>Laporan Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agenda->acara_kegiatan }}</td>
                    <td>{{ $agenda->tanggal->format('Y-m-d') }}</td>
                    <td>{{ $agenda->pakain }}</td>
                    <td>{{ $agenda->tempat }}</td>
                    <td>{{ $agenda->diikuti_oleh }}</td>
                    <td>{{ $agenda->keterangan }}</td>
                    <td>{{ $agenda->link_surat }}</td>
                    <td>{{ $agenda->laporan_kegiatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
