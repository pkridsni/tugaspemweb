<?php
session_start();

// Sertakan file koneksi database
include('config/db.php');

// Cek apakah pengguna sudah login, jika iya arahkan ke home.php
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

// Proses login saat formulir disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk memeriksa pengguna berdasarkan email
    $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika pengguna ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Set variabel sesi untuk nama pengguna setelah login berhasil
            $_SESSION['username'] = $user['name'];
            // Arahkan ke halaman home.php
            header("Location: home.php");
            exit(); // Hentikan eksekusi lebih lanjut
        } else {
            // Jika password salah
            $errorMessage = "Password salah.";
        }
    } else {
        // Jika email tidak ditemukan
        $errorMessage = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styling untuk halaman login */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .container h1 {
            margin-bottom: 20px;
        }
        input[type="email"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            width: 50%;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        p {
            margin-top: 15px;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .status-message {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>

        <!-- Menampilkan pesan kesalahan jika ada -->
        <?php if (isset($errorMessage)): ?>
            <span class="status-message"><?= $errorMessage ?></span>
        <?php endif; ?>

        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Masukkan email Anda" required>
            <input type="password" name="password" placeholder="Masukkan password Anda" required>
            <input type="submit" value="Login" name="submit">
        </form>

        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
