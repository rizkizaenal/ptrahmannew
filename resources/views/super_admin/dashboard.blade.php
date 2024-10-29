@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #fceed1; /* Background Tan */
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
            background-color: #7d3cff; /* Purple-y */
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
            color: #ffffff;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #5c2f91; /* Darker purple on hover */
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
            margin-left: 0;
        }

        .main-content.margin-left {
            margin-left: 250px;
        }

        .menu-icon {
            font-size: 30px;
            cursor: pointer;
            margin-left: 0px;
            margin-right: 10px;
            color: #7d3cff; /* Purple-y */
        }

        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
            background-color: #f2d53c; /* Yellow Gloves */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #c80e13; /* Redhead */
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .list-group-item {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
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
            <span class="title">Super Admin Dashboard</span>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <i class="fas fa-search search-icon"></i>
        </div>
    </div>

    <div class="sidebar-and-content">
        <div class="sidebar" id="sidebar">
            <h4 class="text-white">Dashboard</h4>
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-users"></i> Users</a>
            <a href="#"><i class="fas fa-chart-line"></i> Statistics</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <div class="main-content" id="mainContent">
            <h3 class="mt-3">Dashboard Overview</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Agendas</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $agendas->count() }}</h5>
                                <p class="card-text">Total number of agendas created.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Atensi</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $atensi->count() }}</h5>
                                <p class="card-text">Total number of attentions recorded.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Total Users</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $users->count() }}</h5>
                                <p class="card-text">Total number of users registered.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">Recent Agendas</h4>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var mainContent = document.getElementById("mainContent");

            if (sidebar.classList.contains("show")) {
                sidebar.classList.remove("show");
                mainContent.classList.remove("margin-left");
            } else {
                sidebar.classList.add("show");
                mainContent.classList.add("margin-left");
            }
        }
    </script>
</body>
</html>
@endsection
