<?php
include '../config/koneksi.php'; // Pastikan file koneksi yang benar
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO services (name, description, price, category)
        VALUES ('$_POST[name]', '$_POST[description]', '$_POST[price]', '$_POST[category]')");
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Layanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">APK Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="../admin/dashboard.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="card shadow" style="background-color: #212529; color: #fff;">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Tambah Layanan Baru</h4>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nama Layanan</label>
                    <input type="text" name="name" class="form-control bg-dark text-white border-secondary" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-white">Deskripsi</label>
                    <textarea name="description" class="form-control bg-dark text-white border-secondary" id="description" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label text-white">Harga (Rp)</label>
                    <input type="number" name="price" class="form-control bg-dark text-white border-secondary" id="price" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label text-white">Kategori</label>
                    <input type="text" name="category" class="form-control bg-dark text-white border-secondary" id="category" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                    <button name="simpan" class="btn btn-success">Simpan Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS (via CDN or your own file) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
