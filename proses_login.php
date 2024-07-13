<?php
session_start();
include 'config.php'; // File untuk koneksi ke database

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Username dan password harus diisi.';
        header('Location: index.php');
        exit();
    }

    // Siapkan dan eksekusi query untuk mencari username
    $stmt = $conn->prepare("SELECT id_user, username, password, nama FROM user_mhs WHERE username = ?");
    if ($stmt === false) {
        $_SESSION['error'] = 'Database error, silakan coba lagi nanti.';
        header('Location: index.php');
        exit();
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    // Periksa apakah pengguna ditemukan
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_user, $username, $stored_password, $nama);
        $stmt->fetch();

        // Verifikasi password
        if ($password === $stored_password) {
            // Password benar, set sesi
            $_SESSION['id_user'] = $id_user;
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $nama; // Menambahkan nama ke dalam sesi

            // Notifikasi login berhasil menggunakan JavaScript
            echo '<script>';
            echo 'alert("Selamat Datang di Aplikasi Bea - Data");';
            echo 'window.location.href = "dashboard.php";'; // Arahkan ke halaman dashboard setelah login berhasil
            echo '</script>';
            exit();
        } else {
            // Password salah
            $_SESSION['error'] = 'Password salah.';
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['error'] = 'Username tidak ditemukan.';
    }

    // Jika ada kesalahan, kembalikan ke halaman login
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
