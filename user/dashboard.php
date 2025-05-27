<?php
session_start();
include '../config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM services");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">APK User</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="myorders.php">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Halo, <?= htmlspecialchars($_SESSION['name']) ?></h3>
    </div>

    <div class="row g-4">
        <?php while($d = mysqli_fetch_assoc($data)): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm bg-dark text-white border-light">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($d['name']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-secondary"><?= htmlspecialchars($d['category']) ?></h6>
                        <p class="card-text flex-grow-1"><?= nl2br(htmlspecialchars($d['description'])) ?></p>
                        <p class="fw-bold text-warning">Harga: Rp <?= number_format($d['price'], 0, ',', '.') ?></p>
                        <a href="order.php?id=<?= $d['id'] ?>" class="btn btn-primary mt-auto">Pesan</a>
                    </div>
                </div>
            </div>
        <?php endwhile ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
