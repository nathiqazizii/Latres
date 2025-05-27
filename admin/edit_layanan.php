<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM services WHERE id=$id"));

if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE services SET name='$_POST[name]', description='$_POST[description]', price='$_POST[price]', category='$_POST[category]' WHERE id=$id");
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Service</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <div class="card border-dark" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header bg-dark text-white">
            <h2 class="mb-0">Edit Service</h2>
        </div>
        <div class="card-body">
            <form method="post" class="mt-2">
                <div class="mb-3">
                    <label for="name" class="form-label">Service Name</label>
                    <input id="name" name="name" type="text" class="form-control" value="<?= htmlspecialchars($d['name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required><?= htmlspecialchars($d['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input id="price" name="price" type="number" step="0.01" class="form-control" value="<?= htmlspecialchars($d['price']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input id="category" name="category" type="text" class="form-control" value="<?= htmlspecialchars($d['category']) ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-dark">Update</button>
                <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper (optional, for some components) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
