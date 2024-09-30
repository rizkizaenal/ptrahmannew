<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Agenda</title>
</head>
<body>
    <h1>Daftar Agenda</h1>
    <ul>
        @foreach ($agendas as $agenda)
            <li>{{ $agenda->nama }} - {{ $agenda->tanggal }} - {{ $agenda->keterangan }}</li>
        @endforeach
    </ul>
    
</body>
</html>
<a href="{{ route('agenda.export') }}">Export Agenda</a>
