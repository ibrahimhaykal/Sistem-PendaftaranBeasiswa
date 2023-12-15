<?php
include 'config.php';

if (isset($_GET['destroy'])) {
    $id = $_GET['destroy'];

    // Delete Query
    $sql = "DELETE FROM `pendaftaran_beasiswa` WHERE id = '$id'";

    if (mysqli_query($db, $sql)) {
        // Jika Berhasil
        header('Location: hasil.php?status=deletesuccess');
    } else {
        // Jika Error
        die('Data tidak berhasil dihapus.....');
    }
}