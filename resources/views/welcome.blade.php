<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jurnal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Custom Styles */
        .navbar {
    position: sticky; /* Membuat navbar tetap di atas saat scroll */
    top: 0; /* Menentukan posisi sticky di bagian atas */
    z-index: 1000; /* Menjamin navbar tetap di atas elemen lain */
    background-color: transparent; /* Navbar transparan saat di atas gambar */
    transition: background-color 0.3s, color 0.3s; /* Animasi transisi */
}

/* Warna teks navbar saat belum di-scroll */
.navbar a.nav-link,
.navbar .navbar-brand {
    color: black; /* Warna teks putih untuk navbar di posisi awal */
    transition: color 0.3s;
}

/* Warna teks dan background navbar saat sudah di-scroll */
.navbar.scrolled {
    background-color:white; /* Warna navbar setelah di-scroll */
    color: white;
}

.navbar.scrolled a.nav-link,
.navbar.scrolled .navbar-brand {
    color: #FF4C4C; /* Ubah warna teks menjadi hitam setelah di-scroll */
}

        .carousel-item img {
            width: 100%;
            height: 100vh; /* Menggunakan viewport height agar gambar memenuhi lebih banyak area vertikal */
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .carousel-caption h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .carousel-caption p {
            font-size: 1rem;
        }

        /* Tombol Navigasi Carousel */
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
        }

        /* Style tambahan untuk konten di bawah carousel */
        .content {
            padding: 20px;
            background-color: #fff; /* Warna latar belakang untuk konten */
        }

        .content h2 {
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .content p {
            margin-bottom: 10px;
        }

        /* Jarak antara item navbar */
        .nav-item {
            margin-right: 20px; /* Jarak antar item navbar */
        }

        /* Ukuran logo */
        .navbar-brand img {
            width: 90px; /* Ganti ukuran sesuai kebutuhan */
            margin-right: 5px; /* Jarak antar logo */
        }

        /* Style ikon */
        .contact-icon {
            margin-right: 10px; /* Jarak antara ikon dan teks */
            color: #007bff; /* Warna ikon */
        }
    </style>
</head>
<body class="antialiased">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/pengayom(1).jpg') }}" alt="Logo 1"> <!-- Ganti dengan path ke logo 1 -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a> <!-- Ubah link di sini -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a> <!-- Tambahkan link ke bagian Contact -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning text-white" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/img1.jpg') }}" alt="Gambar 1">
                <div class="carousel-caption">
                    <h5>Selamat datang di lapas kelas IIA GARUT</h5>
                    <p>Lembaga Pemasyarakatan (Lapas) ini melayani pembinaan kepada narapidana untuk daerah Kabupaten Garut dan narapidana dari daerah lain sesuai dengan kondisi kasus/perkaranya.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/lapas2.jpg') }}" alt="Gambar 2">
                <div class="carousel-caption">
                    <h5>Sejarah Berdirinya Lembaga Pemasyarakatan (Lapas)</h5>
                    <p>Lembaga Pemasyarakatan (Lapas) pertama kali didirikan pada masa kolonial Belanda sebagai bagian dari sistem hukum di Indonesia.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/lapas-garut.jpeg') }}" alt="Gambar 3">
                <div class="carousel-caption">
                    <h5>Reformasi Sistem Lapas</h5>
                    <p>Pada tahun 1964, setelah Indonesia merdeka, sistem Lapas mulai mengalami reformasi. Reformasi sistem peradilan pidana bertujuan untuk meningkatkan keadilan dan efisiensi dalam penanganan kasus pidana.</p>
                </div>
            </div>
        </div>

        <!-- Navigasi tombol -->
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Konten Tambahan di Bawah Carousel -->
    <div class="content" id="about"> 
        <div class="container">
            <h2>About</h2>
            <p>Lembaga Pemasyarakatan merupakan Unit Pelaksana Teknis di bawah Direktorat Jenderal Pemasyarakatan Kementerian Hukum dan Hak Asasi Manusia (dahulu Departemen Kehakiman). Penghuni Lembaga Pemasyarakatan bisa narapidana (napi) atau Warga Binaan Pemasyarakatan (WBP) bisa juga yang statusnya masih tahanan, maksudnya orang tersebut masih berada dalam proses peradilan dan belum ditentukan bersalah atau tidak oleh hakim. Pegawai negeri sipil yang menangani pembinaan narapidana dan tahanan di lembaga pemasyarakatan disebut Petugas Pemasyarakatan, atau dahulu lebih dikenal dengan istilah sipir penjara.</p>
        </div>
    </div>

    <!-- Bagian Kontak -->
    <div class="content" id="contact">
        <div class="container">
            <h2>Contact</h2>
            <p><i class="fas fa-map-marker-alt contact-icon"></i> Haurpanggung, Tarogong Selatan, Kabupaten Garut, Jawa Barat 44151</p>
            <p><i class="fas fa-phone contact-icon"></i> No Telp: (0262)233182</p>
            <p><i class="fas fa-envelope contact-icon"></i> Email: info@example.com</p> <!-- Tambahkan email jika perlu -->
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mengubah kelas navbar saat di-scroll
        window.onscroll = function() {
    const navbar = document.querySelector('.navbar');
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
};

    </script>
</body>
</html>
