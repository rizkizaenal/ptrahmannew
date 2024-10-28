@extends('index')
@section('konten')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
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

    <div class="container mt-5">
        <div class="dashboard-metrics">
            <div class="metric-box bg-primary">
                <h2>37</h2>
                <p>Total Produk</p>
            </div>
            <div class="metric-box bg-success">
                <h2>3</h2>
                <p>Roles</p>
            </div>
            <div class="metric-box bg-warning">
                <h2>3</h2>
                <p>Total User</p>
            </div>
            <div class="metric-box bg-danger">
                <h2>65</h2>
                <p>Unique Visitors</p>
            </div>
        </div>

        <div class="table-wrapper">
            <h3>Produk</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Et eos.</td>
                        <td>Soluta quasi.</td>
                        <td>79,141</td>
                        <td>81,141</td>
                        <td>43</td>
                    </tr>
                    <tr>
                        <td>Reiciendis ratione.</td>
                        <td>Sint neque.</td>
                        <td>22,636</td>
                        <td>24,636</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>Consequatur quia et.</td>
                        <td>Rerum.</td>
                        <td>74,170</td>
                        <td>76,170</td>
                        <td>39</td>
                    </tr>
                    <tr>
                        <td>Amet laudantium iure.</td>
                        <td>Soluta quasi.</td>
                        <td>42,269</td>
                        <td>44,269</td>
                        <td>13</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-wrapper mt-5">
            <h3>Users</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Isengoding</td>
                        <td>admin@admin.com</td>
                        <td>Admin</td>
                        <td>Aktif</td>
                    </tr>
                    <tr>
                        <td>Tomiko Van</td>
                        <td>user1@example.com</td>
                        <td>Kasir</td>
                        <td>Aktif</td>
                    </tr>
                    <tr>
                        <td>Elder Titan</td>
                        <td>user2@example.com</td>
                        <td>Admin</td>
                        <td>Nonaktif</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
