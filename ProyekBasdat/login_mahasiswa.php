<?php
// File: login_mahasiswa.php

// Koneksi ke database (gantilah sesuai konfigurasi Anda)
include 'config.php';

// Proses login mahasiswa
// File: login_mahasiswa.php

// Koneksi ke database (sesuaikan konfigurasi Anda)
include 'config.php';

// Proses login mahasiswa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = $_POST['username_mahasiswa'];
    $password = $_POST['password_mahasiswa'];

    // Lakukan sanitasi input
    $username = pg_escape_string($db, $username);

    // Query untuk memeriksa login
    $query = "SELECT * FROM mahasiswa WHERE username = '$username'";
    $result = pg_query($db, $query);

    // Cek hasil query
    if ($result) {
        $row = pg_fetch_assoc($result);
        if ($row && password_verify($password, $row['password'])) {
            echo "Login berhasil. Selamat datang, " . $row['nama'] . "!";
        } else {
            echo "Login gagal. Password salah atau username tidak ditemukan.";
        }
    } else {
        echo "Terjadi kesalahan pada query.";
    }
}

// Tutup koneksi ke database
$db = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Mahasiswa - Liquid</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container main-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Login Mahasiswa</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username_mahasiswa">Username:</label>
                                <input type="text" class="form-control" id="username_mahasiswa" name="username_mahasiswa" required>
                            </div>
                            <div class="form-group">
                                <label for="password_mahasiswa">Password:</label>
                                <input type="password" class="form-control" id="password_mahasiswa" name="password_mahasiswa" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <p class="mt-3 text-center">Belum punya akun? <a href="register_mahasiswa.php">Silakan register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
