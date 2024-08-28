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

        .main-content {
            margin-left: 300px;
            padding: 10px;
            
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .header .logo-title {
            display: flex;
            align-items: center;
        }

        .header img {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .header .title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        .search-bar .search-icon {
            margin-left: 5px;
            font-size: 18px;
            color: #6c757d;
        }

        .agenda {
            margin-top: 20px;
        }

        .banner {
            position: relative;
            text-align: center;
            color: white;
        }

        .banner img {
            width: 100%;
            height: auto;
        }

        .overlay-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
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
            <div class="header">
                <div class="logo-title">
                    <img src="{{ asset('img/lapas.png') }}" alt="Logo">
                    <span class="title">JurnalLasgar</span>
                </div>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </div>
            <div class="agenda">
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
