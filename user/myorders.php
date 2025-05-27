<?php
session_start();
include '../config/koneksi.php';

// Cek apakah user sudah login dan session user_id ada
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: ../login.php');
    exit;
}

$id = intval($_SESSION['user_id']); // pastikan $id berupa integer

// Jalankan query dengan prepared statement agar aman dan terhindar SQL Injection
$stmt = $conn->prepare("
    SELECT o.*, s.name, s.price FROM orders o
    JOIN services s ON o.service_id = s.id
    WHERE o.user_id = ?
");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah query berhasil
if (!$result) {
    die('Query Error: ' . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Riwayat Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">APK User</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <div class="py-4 text-center text-white bg-dark rounded mb-4">
        <h2 class="mb-1">Riwayat Pemesanan</h2>
        <p class="mb-0">Berikut adalah riwayat pemesanan layanan Anda.</p>
    </div>
    <?php if ($result->num_rows === 0): ?>
        <div class="alert alert-info">Belum ada riwayat pemesanan.</div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-striped align-middle">
            <thead class="table-secondary text-dark">
                <tr>
                    <th>Layanan</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($d = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($d['name']) ?></td>
                    <td>Rp <?= number_format($d['price'], 0, ',', '.') ?></td>
                    <td><?= htmlspecialchars($d['order_date']) ?></td>
                    <td><?= nl2br(htmlspecialchars($d['notes'])) ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
