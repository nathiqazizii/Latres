<?php
session_start();
if ($_SESSION['role'] != 'admin') die('Akses ditolak');
include '../config/koneksi.php';

// Ambil data layanan
$data = mysqli_query($conn, "SELECT * FROM services");

// Hitung total order dan total pendapatan
$order_q = mysqli_query($conn, "
    SELECT COUNT(*) AS total_order, COALESCE(SUM(s.price), 0) AS total_pendapatan
    FROM orders o 
    JOIN services s ON o.service_id = s.id
");
$order_info = mysqli_fetch_assoc($order_q);
$total_order = $order_info['total_order'];
$total_pendapatan = $order_info['total_pendapatan'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Skillora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-stat {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
    </style>
</head>
<body class="bg-dark-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">APK Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="tambah_layanan.php">Tambah Layanan</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="pesanan.php">Lihat Pesanan</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card card-stat text-white bg-black opacity-75">
            <div class="card-body">
                <h5 class="card-title">Total Order</h5>
                <p class="card-text fs-3"><?= $total_order ?></p>
            </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card card-stat text-white bg-black opacity-75">
            <div class="card-body">
                <h5 class="card-title">Total Pendapatan</h5>
                <p class="card-text fs-3">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></p>
            </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            Daftar Layanan
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle" style="background-color: #fff;">
            <thead class="table-dark">
                <tr>
                <th scope="col" class="text-white">No</th>
                <th scope="col" class="text-white">Nama Layanan</th>
                <th scope="col" class="text-white">Kategori</th>
                <th scope="col" class="text-white">Harga (Rp)</th>
                <th scope="col" class="text-white">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($d = mysqli_fetch_assoc($data)): ?>
                <tr>
                <td class="text-dark"><?= $no++ ?></td>
                <td class="text-dark"><?= htmlspecialchars($d['name']) ?></td>
                <td class="text-dark"><?= htmlspecialchars($d['category']) ?></td>
                <td class="text-dark"><?= number_format($d['price'], 0, ',', '.') ?></td>
                <td>
                    <a href="edit_layanan.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="hapus_layanan.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus layanan ini?')">Hapus</a>
                </td>
                </tr>
                <?php endwhile ?>
            </tbody>
            </table>
        </div>
        </div>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while($d = mysqli_fetch_assoc($data)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($d['name']) ?></td>
                        <td><?= htmlspecialchars($d['category']) ?></td>
                        <td><?= number_format($d['price'], 0, ',', '.') ?></td>
                        <td>
                            <a href="edit_layanan.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="hapus_layanan.php?id=<?= $d['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus layanan ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
