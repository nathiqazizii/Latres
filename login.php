<?php
session_start();
include 'config/koneksi.php'; // Ubah sesuai dengan nama file koneksimu

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $data  = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role']    = $data['role'];
        $_SESSION['name']    = $data['name'];

        if ($data['role'] == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: user/dashboard.php");
        }
        exit;
    } else {
        $error = "Login gagal! Email atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | APK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f0f2f5;
        }
        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 80px;
        }
    </style>
</head>
<body>

<div class="container login-card">
    <div class="card shadow-sm" style="background-color: #212529; color: #fff;">
        <div class="card-header text-center bg-dark text-white">
            <h4 class="mb-0">Login Skillora</h4>
        </div>
        <div class="card-body">
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <button name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
        <div class="card-footer text-center bg-dark text-white">
            Belum punya akun? <a href="register.php" class="text-info">Daftar Sekarang</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
