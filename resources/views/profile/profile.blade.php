<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 700;
            color: #333;
        }
        .form-label {
            font-weight: 600;
            color: #555;
        }
        .btn-primary, .btn-danger, .btn-secondary {
            padding: 12px;
            border-radius: 6px;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .form-control {
            border-radius: 6px;
            font-size: 1rem;
            padding: 12px;
            border: 1px solid #ccc;
        }
        .alert {
            margin-bottom: 20px;
        }
        .row img {
            border-radius: 50%;
            object-fit: cover;
            width: 150px;
            height: 150px;
        }
        .d-flex {
            gap: 20px;
        }
        .row {
            display: flex;
            align-items: center;
            gap: 30px;
        }
        .top-bar {
            display: flex;
            justify-content: center;
            padding: 15px;
            background-color: #343a40;
            color: white;
        }
        .top-bar h3 {
            margin: 0;
            font-size: 1.5rem;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            position: fixed;
            height: 100%;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 16px;
            color: #333;
            display: block;
        }
        .sidebar a:hover {
            background-color: #e2e6ea;
        }
        .logo {
            width: 30px;
            height: auto;
            margin-right: 10px;
        }
        .search-bar {
            flex: 1;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h3>Profile</h3>
    </div>

    <div class="container">
        <h2>Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-3">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="img-fluid img-thumbnail">
                    @else
                        <img src="{{ asset('default-profile.png') }}" alt="Default Profile Photo" class="img-fluid img-thumbnail">
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Change Profile Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back to Dashboard</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
