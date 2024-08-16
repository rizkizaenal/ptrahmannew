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
            background-color: #f5f5f5;
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
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin: 20px 0;
            background-color: white;
            text-align: center;
            text-decoration: none;
            color: black;
            border-radius: 5px;
            width: 100%;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
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
            margin: 50px 0;
        }
        .calendar {
            text-align: center;
        }
        .calendar table {
            margin: 50 auto;
            border-collapse: collapse;
        }
        .calendar th, .calendar td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .calendar th {
            background-color: #f0f0f0;
        }
        .agenda {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            
        }
        .agenda-item {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin: 50 auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="path_to_image/logo.png" alt="Logo">
        <a href="#">Agenda</a>
        <a href="#">Dashboard 2</a>
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
            <p>January</p>
            <table>
                <tr>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                    <th>Sun</th>
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
                <!-- Add more rows as needed -->
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
</body>
</html>
