<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            display: flex;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #ccc;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar img {
            max-width: 100%;
            height: auto;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: white;
            text-align: center;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #eee;
            border-radius: 5px;
        }
        .search-bar input[type="text"] {
            padding: 5px;
            border-radius: 20px;
            border: 1px solid #ddd;
            width: 300px;
        }
        .calendar, .agenda {
            margin: 20px 0;
        }
        .calendar {
            text-align: center;
        }
        .agenda {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="path_to_image/logo.png" alt="Logo">
        <a href="#">Agenda</a>
        <a href="#">Dasboard 2</a>
        <a href="#">Akun</a>
    </div>
    <div class="main-content">
        <div class="top-bar">
            <span class="menu-icon">☰</span>
            <div class="search-bar">
                <input type="text" placeholder="Hinted search text">
            </div>
        </div>

        <div class="calendar">
            <p>january</p>
            <table>
                <tr>
                    <th>mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>fri</th>
                    <th>sat</th>
                    <th>sun</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                </tr>
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </table>
        </div>

        <div class="agenda">
            <h2>Agenda</h2>
            <div class="agenda-item"></div>
            <div class="agenda-item"></div>
            <div class="agenda-item"></div>
            <div class="agenda-item"></div>
        </div>
    </div>
</body>
</html>
