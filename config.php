<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "beasiswa"; // Perbaiki tanda kutip disini

// Membuat koneksi ke database
$db = mysqli_connect($server, $user, $password, $nama_database);
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>