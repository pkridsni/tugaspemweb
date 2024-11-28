<?php
session_start();
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi
header("Location: index.html"); // Arahkan pengguna kembali ke login setelah logout
exit();
?>
