<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Agenda</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Input Agenda</h1>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('agenda.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Agenda:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan:</label>
                <textarea id="keterangan" name="keterangan" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </form>
    </div>

    <!-- Modal Success -->
    @if(session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">OK</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
                keyboard: false
            });
            myModal.show();
        </script>
    @endif

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
