<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            margin: 0;
            padding: 0;
        }

        .top-bar {
            background-color: #ffffff;
            padding: 10px 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .top-bar img.logo {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
            margin-left: 10px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-left: 10px;
        }

        .search-bar {
            position: relative;
            width: 30%;
        }

        .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #6c757d;
        }

        .sidebar-and-content {
            display: flex;
            margin-top: 60px;
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            padding: 20px;
            position: fixed;
            top: 60px;
            left: -250px;
            height: calc(100vh - 60px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: left 0.3s ease;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #ffffff;
            border-left: 1px solid #dee2e6;
            transition: margin-left 0.3s ease;
            margin-left: 0; /* Start without sidebar */
        }

        .main-content.margin-left {
            margin-left: 250px; /* Add margin when sidebar is shown */
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            margin-left: 0px;
            margin-right: 10px;
            color: #007bff;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="d-flex align-items-center">
            <i class="fas fa-bars menu-icon" onclick="toggleSidebar()"></i>
            <img src="{{ asset('img/lapas.png') }}" alt="Logo" class="logo">
            <span class="title">JurnalLasgar</span>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search search-icon"></i>
        </div>
    </div>

    <div class="sidebar-and-content">
        <div class="sidebar" id="sidebar">
            <h4>Dashboard</h4>
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-chart-line"></i> Statistics</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="main-content" id="mainContent">
            <h3 class="mt-3">Agenda List</h3>
            <ul class="list-group">
                @foreach($agendas as $agenda)
                    <li class="list-group-item">
                        <strong>{{ $agenda->acara_kegiatan }}</strong><br>
                        <small>Date: {{ $agenda->tanggal->format('d M Y') }} | Time: {{ $agenda->waktu }}</small><br>
                        <small>Location: {{ $agenda->tempat }} | Attended by: {{ $agenda->diikuti_oleh }}</small><br>
                        <small>{{ $agenda->keterangan }}</small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var mainContent = document.getElementById("mainContent");

            if (sidebar.style.left === "0px") {
                sidebar.style.left = "-250px"; // Hide the sidebar
                mainContent.classList.remove('margin-left'); // Remove margin
            } else {
                sidebar.style.left = "0px"; // Show the sidebar
                mainContent.classList.add('margin-left'); // Add margin
            }
        }
    </script>
</body>
</html>
