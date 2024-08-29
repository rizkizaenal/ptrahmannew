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
            color: #fff;
        }

        .top-bar {
            background-color: #fff;
            padding: 10px 20px;
            border-bottom: 1px solid #E0E0E0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
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
            color: #000;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .sidebar-and-content {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            padding-top: 20px;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            width: 250px;
            align-items: flex-start;
            margin-right: 200px; /* Pengurangan jarak sidebar */
            padding: 10px;
            
        }

        .sidebar a {
            width: 100%;
            margin-bottom: 10px;
            background-color: #E1D7C6;
        }

        .banner {
            flex-grow: 1;
            position: relative;
            text-align: center;
        }

        .banner img {
            max-width: 100%;
            height: auto;
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

        .main-content {
            flex-grow: 1; /* Membuat main-content mengikuti lebar banner */
            padding: 20px; /* Menghilangkan padding tambahan */
            
        }
        
        .agenda-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #E7F0DC;
            border-radius: 5px;
            width: 75%;
            color: black;
            text-align: left;
            margin-left: auto;
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
                <a href="{{ route('agenda.create') }}" class="btn btn-outline-dark">Agenda</a>
                <a href="{{ route('forms.atensi') }}" class="btn btn-outline-dark">Atensi</a>
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Akun
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="accountDropdown">
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
            <div class="banner">
                <img src="{{ asset('img/lapas2.jpg') }}" alt="Banner" class="img-fluid">
                <div class="overlay-text">
                    <h2>S.I.A.P LAPAS KELAS IIB GARUT</h2>
                    <p>Sistem Informasi Agenda Pemasyarakatan</p>
                </div>
            </div>
        </div>
        <div class="main-content">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>
