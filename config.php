<?php
// config.php - file konfigurasi koneksi database
$host = "localhost";      // biasanya localhost
$username = "root";       // sesuaikan dengan user database kamu
$password = "";           // sesuaikan dengan password database kamu
$database = "db_jepang"; // ganti dengan nama database kamu

// Membuat koneksi
$config = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($config->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
