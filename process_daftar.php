<?php
include 'add_ipk.php';

// Function untuk upload file
function uploadFile($fileName, $tmpName)
{
    $fileParts = pathinfo($fileName);
    $fileExtension = strtolower($fileParts['extension']);
    $allowedExtensions = ['jpg', 'pdf', 'zip'];

    // Validasi Ekstensi
    if (in_array($fileExtension, $allowedExtensions)) {
        $targetDir = "uploads/";
        $targetPath = $targetDir . $fileName;
        if (move_uploaded_file($tmpName, $targetPath)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';

    if (defined('IPK') && IPK >= 3) {
        $ipk = IPK;
        $beasiswa = $_POST['beasiswa'] ?? "";
    } else {
        header('Location: pendaftaran.php');
        exit;
    }

    $nama = $_POST['nama'] ?? "";
    $email = $_POST['email'] ?? "";
    $nomorHp = $_POST['nomor_hp'] ?? "";
    $semester = $_POST['semester'] ?? "";

    $fileName = "";
    if ($ipk >= 3 && isset($_FILES['berkas']['name'])) {
        if (uploadFile($_FILES['berkas']['name'], $_FILES['berkas']['tmp_name'])) {
            $fileName = $_FILES['berkas']['name'];
        } else {
            header('Location: daftar.php?status=gagal');
            exit;
        }
    }

    $statusAjuan = 'belum di verifikasi';
    $sql = "INSERT INTO pendaftaran_beasiswa (nama, email, nomor_hp, semester, ipk, beasiswa, berkas, status_ajuan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ssssdsss", $nama, $email, $nomorHp, $semester, $ipk, $beasiswa, $fileName, $statusAjuan);

    if ($ipk >= 3 && mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($db);
        header('Location: hasil.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($db);
    }
} else {
    header('Location: pendaftaran.php');
    exit;
}
?>
