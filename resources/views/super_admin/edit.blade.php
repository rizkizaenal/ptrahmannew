<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin - Edit Profile</title>
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
        .btn-primary:hover { background-color: #0056b3; border-color: #004085; }
        .btn-danger:hover { background-color: #c82333; border-color: #bd2130; }
        .btn-secondary:hover { background-color: #5a6268; border-color: #545b62; }
        .form-control {
            border-radius: 6px;
            font-size: 1rem;
            padding: 12px;
            border: 1px solid #ccc;
        }
        .alert { margin-bottom: 20px; }
        .row img {
            border-radius: 50%;
            object-fit: cover;
            width: 150px;
            height: 150px;
        }
        .top-bar {
            display: flex;
            justify-content: center;
            padding: 15px;
            background-color: #9ABF80;
            color: white;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h3>Superadmin Panel</h3>
    </div>

    <div class="container">
        <h2>Edit Profile</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card p-4">
            <form action="{{ route('superadmin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-4">
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="img-fluid img-thumbnail">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-person-fill img-thumbnail" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Change Profile Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                        </div>
                        <button type="submit" class="btn btn-warning">Update Profile</button>
                    </div>
                </div>
            </form>

            <!-- Form Hapus Foto -->
            <form action="{{ route('superadmin.profile.deletePhoto', $user->id) }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Remove Profile Photo</button>
            </form>

            <a href="{{ route('super_admin.dashboard') }}" class="btn btn-success mt-4">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
