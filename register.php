<?php
include 'config/koneksi.php';

if (isset($_POST['register'])) {
    $nama  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    // Untuk keamanan dasar, sebaiknya password di-hash sebelum disimpan
    $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (name, email, password, role) VALUES ('$nama', '$email', '$pass_hashed', 'user')");
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrasi Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    
</head>
<body>
<div class="container" style="max-width: 400px; margin-top: 60px;">
    <div class="card shadow-sm bg-dark text-white">
        <div class="card-body">
            <h3 class="card-title mb-4 text-center">Registrasi Pengguna</h3>
            <form method="post" novalidate>
                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control bg-secondary text-white" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-white">Alamat Email</label>
                    <input type="email" id="email" name="email" class="form-control bg-secondary text-white" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-white">Kata Sandi</label>
                    <input type="password" id="password" name="password" class="form-control bg-secondary text-white" placeholder="Masukkan password" required minlength="6">
                    <div class="form-text text-light">Minimal 6 karakter.</div>
                </div>

                <button type="submit" name="register" class="btn btn-primary w-100">Daftar</button>
            </form>
            <p class="text-center mt-3">
                Sudah punya akun? <a href="login.php" class="text-info">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
