<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #555;
        }
        .btn {
            padding: 10px 20px;
            font-size: 1rem;
        }
        .form-control {
            border-radius: 6px;
            padding: 10px;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .top-bar {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .top-bar h3 {
            margin: 0;
        }
        .alert {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h3>Profile</h3>
    </div>

    <div class="container">
        <h2>Edit Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 text-center">
                <img src="{{ asset('storage/' . $user->photo ?? 'default-profile.png') }}" alt="Profile Photo" class="profile-photo">
                <div>
                    <label for="photo" class="form-label">Change Profile Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo">
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="old_password" id="old_password">
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Update Profile</button>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
