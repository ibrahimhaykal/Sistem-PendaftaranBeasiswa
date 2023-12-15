<?php
include 'config.php';

// Jika form dikirim (saat tombol update ditekan)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status_ajuan = $_POST['status_ajuan'];

    // Query untuk mengupdate status ajuan di database
    $query = "UPDATE `pendaftaran_beasiswa` SET `status_ajuan`='$status_ajuan' WHERE id = '$id'";
    $sql = mysqli_query($db, $query);

    if ($sql) {
        // Redirect ke halaman hasil dengan pesan sukses
        header('Location: hasil.php?status=updatesuccess');
        exit(); // Keluar dari skrip agar tidak melanjutkan eksekusi
    } else {
        die('Data tidak berhasil diupdate.....');
    }
}
?>
