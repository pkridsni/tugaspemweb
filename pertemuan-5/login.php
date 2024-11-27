<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><style>
.auth-buttons {
    display: flex;  
    gap: 2px;                      /* Menambahkan jarak antara tombol */
}

button, .button {
    padding: 10px 20px;
    background-color: #4CAF50; /* Warna latar belakang tombol */
    color: white;
    border: 1px solid #4CAF50;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
}

button:hover, .button:hover {
    background-color: #45a049; /* Warna latar belakang saat hover */
}
</style>
<body>
    <h1>login</h1>
    <div class="auth-buttons">
        <form action="backend/login.php" method="post">
            <input type="email" name="email" placeholder="masukkan email anda">
            <input type="password" name="password" placeholder="masukkan password anda">
            <input type="submit" value="login" name="submit">
        </form> <br>
        <a href="register.php">
            <input type="submit" value="Register" name="submit">
        </a>
    </div>
</body>
</html>