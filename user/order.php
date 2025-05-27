<?php
session_start();
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM services WHERE id=$id"));

if (isset($_POST['pesan'])) {
    mysqli_query($conn, "INSERT INTO orders (user_id, service_id, notes)
                         VALUES ('$_SESSION[user_id]', '$id', '" . mysqli_real_escape_string($conn, $_POST['notes']) . "')");
    header("Location: myorders.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Order <?= htmlspecialchars($data['name']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">APK Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5" style="max-width: 600px;">
    <h3 class="mb-4">Order <strong><?= htmlspecialchars($data['name']) ?></strong></h3>
    <form method="post" class="p-4 rounded" style="background-color: #222; color: #fff;">
        <div class="mb-3">
            <label for="notes" class="form-label" style="color: #fff;">Catatan Tambahan (opsional)</label>
            <textarea id="notes" name="notes" class="form-control" rows="4" placeholder="Tuliskan catatan tambahan jika ada..." style="background-color: #333; color: #fff; border: 1px solid #444; caret-color: #fff;" onfocus="this.style.color='#fff';" onblur="this.style.color='#fff';"></textarea>
            <style>
                textarea::placeholder {
                    color: #bbb !important;
                    opacity: 1;
                }
            </style>
        </div>
        <button type="submit" name="pesan" class="btn btn-success">Pesan Sekarang</button>
        <a href="dashboard.php" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
