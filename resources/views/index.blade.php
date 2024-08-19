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
            width: 300px;
            background-color: #ccc;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }
        .sidebar img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px; /* Add some space below the logo */
        }
        .main-content {
            margin-left: 300px;
            padding: 20px;
        }
        .calendar table {
            margin: 20px auto;
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .agenda-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-light">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <a href="#" class="btn btn-outline-primary w-100 mb-2">Agenda</a>
            <a href="#" class="btn btn-outline-primary w-100 mb-2">Dashboard 2</a>
            <a href="#" class="btn btn-outline-primary w-100 mb-2">Akun</a>
        </div>
        <div class="main-content container">
            <div class="top-bar d-flex justify-content-between align-items-center mb-4">
                <span class="menu-icon">☰</span>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Hinted search text">
                </div>
            </div>

            <div class="calendar">
                <h2 class="text-center">January</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                            <th>Sun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>

            <div class="agenda">
                <h2>Agenda</h2>
                <div class="agenda-item">Agenda item 1</div>
                <div class="agenda-item">Agenda item 2</div>
                <div class="agenda-item">Agenda item 3</div>
                <div class="agenda-item">Agenda item 4</div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>