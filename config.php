<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_beasiswa";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
