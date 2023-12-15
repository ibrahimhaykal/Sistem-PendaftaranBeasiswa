<?php
include 'config.php';

// Lakukan jika ada input get Edit
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // Menggunakan prepared statement untuk mencegah SQL injection
    $query = "SELECT * FROM `pendaftaran_beasiswa` WHERE id = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $mahasiswa = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    /* Custom CSS for navbar hover effects */
    .navbar-dark .navbar-nav .nav-link:hover {
      color: #ffffff;
      background-color: #343a40;
    }
    /* Gaya untuk footer */
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #343a40;
      color: white;
      padding: 15px 0;
    }
  </style>
  <title>KampusKuAja</title>
</head>
<body>
 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="margin-left: 30px;">Pilihan Beasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pendaftaran.php">Daftar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#hasil" style="margin-right: 205px;">Hasil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar End -->

<!-- Main Content -->
<div class="container mt-5">
  <h1 class="text-center">Edit Status</h1>
  <section>
    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
          <div class="alert alert-success" role="alert">
            Berhasil Mengupdate Status
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header">
            <p>Edit Status Verifikasi</p>
          </div>
          <div class="card-body">
            <form action="updatestatus.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
              <div class="row mb-4">
                <div class="col-md-4">
                  <label for="nama">Status Ajuan</label>
                </div>
                <div class="col-md-8">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status_ajuan" id="status_ajuan1" value="terverifikasi" <?= ($mahasiswa['status_ajuan'] == 'terverifikasi') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="status_ajuan1">
                      Verifikasi
                    </label>
                  </div>
                  <button type="submit" name="update" value="update" class="btn btn-success mt-3">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- Main Content End -->

<!-- Footer -->
<footer class="bg-dark text-white py-4">
  <div class="container text-center">
    <p>&copy; 2023 KampuskuAja. All Rights Reserved.</p>
  </div>
</footer>
<!-- Optional: JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw7f+uaOV9W4a/4YfOCBq3Ff2Jf8a0xhMl9tfv7X8e3mIa/d8J6B5Skq5th7I" crossorigin="anonymous"></script>
</body>
</html>