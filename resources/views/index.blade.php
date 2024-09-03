<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
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

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
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
            left: 0;
            height: calc(100vh - 60px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar a {
            display: block;
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

        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 270px;
            background-color: #ffffff;
            border-left: 1px solid #dee2e6;
        }

        .banner {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }

        .banner img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .overlay-text h2 {
            font-size: 36px;
            font-weight: bold;
        }

        .overlay-text p {
            font-size: 18px;
            margin-top: 10px;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #6c757d;
        }

        .agenda-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #e7f0dc;
            border-radius: 5px;
            color: #000;
        }

        .dropdown-menu {
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .dropdown-menu a {
            display: block;
            padding: 5px 0;
            color: black;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column">
        <div class="top-bar">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/lapas.png') }}" alt="Logo" class="logo">
                <span class="title">JurnalLasgar</span>
            </div>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="user-profile">
                <i class="far fa-bell fa-2x"></i>
                <img src="{{ asset('img/user.jpg') }}" alt="User" class="img-fluid rounded-circle">
            </div>
        </div>
        <div class="sidebar-and-content">
            <div class="sidebar">
                <a href="#">Dashboard</a>
                <a href="#">Components</a>
                <div class="dropdown">
                    <a href="#" id="formsDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: black; cursor: pointer;">Forms</a>
                    <ul class="dropdown-menu" aria-labelledby="formsDropdown">
                        <li><a href="{{ route('agenda.create') }}">Agenda</a></li>
                        <li><a href="{{ route('atensi.index') }}">Atensi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="#" style="text-decoration: none; color: black;">Another Form</a></li>
                    </ul>
                </div>
                <a href="#">Tables</a>
                <a href="#">Charts</a>
                <a href="#">Icons</a>
                <a href="#">Register</a>
                <a href="#">Login</a>
                <div class="dropdown">
                    <a href="#" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: black; cursor: pointer;">Akun</a>
                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                        <li><a href="#" style="text-decoration: none; color: black;">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: black;">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content">
                <div class="banner">
                    <img src="{{ asset('img/lapas2.jpg') }}" alt="Banner" class="img-fluid">
                    <div class="overlay-text">
                        <h2>S.I.A.P LAPAS KELAS IIB GARUT</h2>
                        <p>Sistem Informasi Agenda Pemasyarakatan</p>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h4>Reports / Today</h4>
                <div class="agenda-item">Agenda item 1</div>
                <div class="agenda-item">Agenda item 2</div>
                <div class="agenda-item">Agenda item 3</div>
                <div class="agenda-item">Agenda item 4</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
