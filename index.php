
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Selamat Datang di Aplikasi Kami</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body, html {
      height: 100%;
      background: linear-gradient(135deg,rgb(113, 113, 114) 0%,rgb(1, 88, 238) 100%);
      color: white;
    }
    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 15px;
    }
    .hero h1 {
      font-weight: 700;
      font-size: 3.5rem;
      margin-bottom: 0.5rem;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    }
    .hero p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.25);
    }
    .btn-custom {
      min-width: 150px;
      margin: 0 10px;
      font-weight: 600;
      font-size: 1.1rem;
    }
    footer {
      position: fixed;
      bottom: 10px;
      width: 100%;
      text-align: center;
      color: rgba(255,255,255,0.7);
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="hero container">
    <h1>Selamat Datang di Aplikasi Kami</h1>
    <p>Temukan layanan terbaik dan pesan dengan mudah.</p>
    <div>
      <a href="login.php" class="btn btn-light btn-custom">Masuk</a>
      <a href="register.php" class="btn btn-outline-light btn-custom">Daftar</a>
    </div>
  </div>
  
  <footer>
    &copy; <?= date('Y') ?> - Aplikasi Kamu. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
