<?php
require './config/db.php';

// Mendapatkan ID produk dari parameter URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$product = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($product);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image']; // Jika ingin mengubah gambar juga

    // Update data produk
    mysqli_query($conn, "UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");

    // Redirect ke halaman data produk
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <style>
        /* Reset and global styles */
        body, h1, table, input, button {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
        }

        .container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        td input:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            th, td {
                font-size: 14px;
            }

            button {
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Produk</h1>
        <form method="post">
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <td><input type="text" name="name" value="<?= htmlspecialchars($row['name']); ?>" required></td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td><input type="text" name="price" value="<?= htmlspecialchars($row['price']); ?>" required></td>
                </tr>
                <tr>
                    <th>Gambar URL</th>
                    <td><input type="text" name="image" value="<?= htmlspecialchars($row['image']); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="update">Update Produk</button>
                    </td>
                </tr>
            </table>
        </form>
        <a href="profile.php" class="back-link">Kembali ke Data Produk</a>
    </div>
</body>
</html>
