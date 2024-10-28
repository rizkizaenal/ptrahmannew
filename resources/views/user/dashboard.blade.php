@extends('index')

@section('konten')

<aside class="sidebar" id="sidebar">
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard </a>
            <div class="dropdown">
                <a href="#" id="formsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-folder-open"></i> Forms
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('agenda.create') }}"><i class="fas fa-calendar-alt"></i> Agenda</a></li>
                    <li><a href="{{ route('atensi.index') }}"><i class="fas fa-list"></i> Atensi</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <a href="#" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> Akun
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile.show') }}"><i class="fas fa-user"></i> Profile</a></li>
                </ul>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </aside>
        <div class="main-content" id="mainContent">
                <div class="banner">
                    <img src="{{ asset('img/lapas2.jpg') }}" alt="Banner" class="img-fluid">
                    <div class="overlay-text">
                        <h2>S.I.A.P LAPAS KELAS IIA GARUT</h2>
                        <p>Sistem Informasi Agenda Pemasyarakatan</p>
                    </div>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h3>Agenda</h3>
                <div class="agenda-item">Agenda item 1</div>
                <div class="agenda-item">Agenda item 2</div>
                <div class="agenda-item">Agenda item 3</div>
                <div class="agenda-item">Agenda item 4</div>
            </div>
        </div>
    </div>
@endsection