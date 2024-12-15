<?php
$host = "localhost";      // Host database
$username = "root";       // Username MySQL
$password = "";           // Password MySQL (kosong jika default)
$database = "db_rumahsakit"; // Nama database

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
