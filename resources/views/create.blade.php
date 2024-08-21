<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your meta tags, title, CSS files here -->
</head>
<body>
    <!-- Main content of the page -->
    <div class="d-flex">
        <!-- Sidebar, main content, calendar, etc. -->
        <div class="sidebar">
            <!-- Sidebar content -->
        </div>
        <div class="main-content container-fluid p-0">
            <!-- Top bar, search bar, etc. -->
            <div class="top-bar d-flex justify-content-between align-items-center mb-4">
                <!-- Top bar content -->
            </div>

            <!-- Calendar -->
            <div class="calendar">
                <!-- Calendar content -->
            </div>

            <!-- Agenda Section -->
            <div class="agenda">
                <h2>Agenda</h2>
                <div class="agenda-item">Agenda item 1</div>
                <div class="agenda-item">Agenda item 2</div>
                <div class="agenda-item">Agenda item 3</div>
                <div class="agenda-item">Agenda item 4</div>
            </div>
        </div>
    </div>

    <!-- Include the modal here -->
    <!-- Modal -->
    <div class="modal fade" id="agendaModal" tabindex="-1" aria-labelledby="agendaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agendaModalLabel">Input Agenda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="agendaForm" method="POST" action="{{ route('agenda.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JS files at the bottom -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        // JavaScript to handle modal opening
        document.querySelectorAll('.agenda-item').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('agendaModal').querySelector('#title').value = this.textContent.trim();
                var agendaModal = new bootstrap.Modal(document.getElementById('agendaModal'));
                agendaModal.show();
            });
        });
    </script>
</body>
</html>
