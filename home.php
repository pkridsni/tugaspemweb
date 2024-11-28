<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil nama pengguna dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Selamat Datang</title>
    <link rel="stylesheet" href="scss/styles.css">
    <link rel="stylesheet" href="scss/styles.css">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">Produk Kami</div>
        <!-- Hamburger Menu -->
        <div class="hamburger" id="hamburger-menu" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- Dropdown Menu -->
        <div class="dropdown" id="dropdown-menu">
            <a href="home.php">Home</a>
            <a href="add_product.php">Tambah Produk</a>
            <a href="profile.php">Data Produk</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <h1>Selamat Datang, <?= htmlspecialchars($username); ?>!</h1>
        <p>Anda berhasil login ke dalam sistem. Sekarang anda berada di halaman home!!!</p>
        <!-- <p><a href="logout.php">Logout</a></p> -->
    </div>

    <script>
        // Fungsi untuk toggle (menyembunyikan/memunculkan) dropdown menu
        function toggleMenu() {
            var dropdown = document.getElementById("dropdown-menu");
            dropdown.classList.toggle("show");
        }
    </script>

</body>
</html>
