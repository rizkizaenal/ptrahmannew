<!-- resources/views/layouts/app_with_sidebar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <!-- Tambahkan link CSS di sini -->
</head>
<body>
    <div id="app">
        <div class="sidebar">
            <!-- Konten Sidebar -->
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('agenda.create') }}">Buat Agenda</a></li>
                <li><a href="{{ route('atensi.create') }}">Buat Atensi</a></li>
            </ul>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Tambahkan link JavaScript di sini -->
</body>
</html>
