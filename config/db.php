<?php
// Koneksi ke database MySQL
$servername = "localhost"; // Nama server database
$username = "root"; // Nama pengguna database
$password = ""; // Password database
$dbname = "pemweb-db"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
