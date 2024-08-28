<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #333;
        }
        .sidebar {
            width: 250px;
            background-color: #AAB396;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            position: fixed;
        }
        .main-content {
            margin-left: 300px;
            padding: 10px;
        }
        h2 {
            text-align: center;
        }
        .agenda {
            margin-top: 20px;
        }
        .agenda-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #E7F0DC;
            border-radius: 5px;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
        .search-bar {
            position: relative;
            width: 60%; /* Kurangi lebar untuk menyesuaikan elemen lainnya */
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
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #f8f9fa;
            position: relative; /* Tambahkan ini untuk memposisikan elemen secara absolut */
        }

        .top-bar img {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
            position: absolute;
            left: 10px; /* Tempatkan logo lebih dekat ke kiri */
            top: 50%; /* Tempatkan di tengah secara vertikal */
            transform: translateY(-50%); /* Untuk memastikan logo berada di tengah */
        }

        .title {
            position: absolute;
            left: 100px; /* Geser judul ke kanan setelah logo */
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .agenda {
            position: relative;
            text-align: center;
            color: black;
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
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <a href="{{ route('agenda.create') }}" class="btn btn-outline-light w-100 mb-2">Agenda</a>
            <a href="{{ route('forms.atensi') }}" class="btn btn-outline-light w-100 mb-2">Atensi</a>
            <div class="dropdown w-100 mb-2">
                <button class="btn btn-outline-light dropdown-toggle w-100" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Akun
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="accountDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="top-bar d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('img/lapas.png') }}" alt="Logo">
                    <span class="title">JurnalLasgar</span>
                </div>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <div class="d-flex align-items-center">
                    <i class="far fa-bell fa-2x me-3"></i>
                    <img src="{{ asset('img/user.png') }}" alt="User" class="img-fluid rounded-circle" width="40">
                </div>
            </div>
            <div class="agenda position-relative">
                <img src="{{ asset('img/lapas2.jpg') }}" alt="Banner" class="img-fluid">
                <div class="overlay-text">
                    <h2>S.I.A.P LAPAS KELAS IIB GARUT</h2>
                    <p>Sistem Informasi Agenda Pemasyarakatan</p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h4 style="text-align: left;">Reports / Today</h4>
<div class="agenda-item" style="text-align: left;">Agenda item 1</div>
<div class="agenda-item" style="text-align: left;">Agenda item 2</div>
<div class="agenda-item" style="text-align: left;">Agenda item 3</div>
<div class="agenda-item" style="text-align: left;">Agenda item 4</div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
