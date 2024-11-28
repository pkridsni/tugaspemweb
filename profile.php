<?php
require 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
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
        <h1>Data Produk</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Gambar Produk</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = mysqli_query($conn, "SELECT * FROM products");
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($products)) {
                    ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=$row['name'];?></td>
                            <td><?=$row['price'];?></td>
                            <td><a href="<?=$row['image'];?>" target="_blank">Unduh</a></td>
                            <td>
                                <a href="edit.php?id=<?=$row['id'];?>">Edit</a> | 
                                <a href="delete.php?id=<?=$row['id'];?>">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
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
