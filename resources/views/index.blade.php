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
            background-color: #C9DABF; /* Updated background color */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            position: fixed;
        }
        .sidebar img {
            max-width: 70%;
            height: auto;
            margin-bottom: 20px;
        }
        .main-content {
            margin-left: 300px;
            padding: 20px;
        }
        .calendar {
            margin: 50px auto; /* Center the calendar horizontally */
            max-width: 600px;  /* Set maximum width for calendar */
            width: 100%;       /* Make sure calendar uses full width of container */
        }

        .calendar table {
            width: 100%; /* Full width of .calendar container */
            border-collapse: collapse; /* Remove space between borders */
        }

        .calendar th, .calendar td {
            padding: 10px; /* Padding inside cells */
            border: 1px solid #CCC; /* Cell border */
            text-align: center; /* Center text */
            font-size: 14px; /* Font size for table text */
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
            width: 90%; /* Ensure it spans the full width of its container */
        }
        .search-bar input {
            width: 100%; /* Make input field span full width of search-bar */
            padding: 10px 40px 10px 10px; /* Add padding and space for the icon */
            border: 1px solid #ccc; /* Light border for input field */
            border-radius: 5px; /* Round the corners of the input */
        }
        .search-bar .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <img src="{{ asset('img/lapas.png') }}" alt="Logo">
            <a href="{{ route('agenda.create') }}" class="btn btn-outline-light w-100 mb-2">Agenda</a>
            <a href="#" class="btn btn-outline-light w-100 mb-2">Atensi</a>
            <!-- Start of Account Dropdown -->
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
            <!-- End of Account Dropdown -->
        </div>
        <div class="main-content container-fluid p-0">
            <div class="top-bar d-flex justify-content-between align-items-center mb-4">
                <span class="menu-icon">☰</span>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="Search">
                    <i class="fas fa-search search-icon"></i>
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
                        <tr>
                            <td>8</td>
                            <td>9</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                            <td>19</td>
                            <td>20</td>
                            <td>21</td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>23</td>
                            <td>24</td>
                            <td>25</td>
                            <td>26</td>
                            <td>27</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td>30</td>
                            <td>31</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
