<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Weruh Tani</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body { display: flex; min-height: 100vh; overflow-x: hidden; }
        .sidebar { width: 250px; background-color: #f8f9fa; padding: 20px; border-right: 1px solid #ddd; height: 100vh; }
        .sidebar h4 { margin-bottom: 30px; font-weight: bold; }
        .sidebar a { display: block; padding: 10px; margin: 5px 0; text-decoration: none; color: #333; border-radius: 5px; }
        .sidebar a:hover { background-color: #e9ecef; }
        .content { flex: 1; padding: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Weruh Tani</h4>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.buat_pesanan') }}">Buat Pesanan</a>
        <a href="{{route('admin.tabel_pelanggan') }}">Tabel Pelanggan</a>
        <a href="#" id="logoutButton">Keluar</a>
    </div>
    <div class="content">
        @yield('content')
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Keluar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <a href="{{ url('/') }}" class="btn btn-danger">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('logoutButton').addEventListener('click', () => {
            const logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
            logoutModal.show();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const formAction = this.getAttribute('data-url');
                    const deleteForm = document.getElementById('deleteForm');
                    deleteForm.action = formAction;
                    const deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                    deleteModal.show();
                });
            });
        });
    </script>    
</body>
</html>
