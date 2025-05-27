<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "service_marketplace";

$conn = mysqli_connect("localhost", "root", "", "service_marketplace");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
