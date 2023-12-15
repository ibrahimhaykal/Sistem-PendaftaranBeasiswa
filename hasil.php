<?php
include 'config.php';

// Inisialisasi variabel i
$i = 1;
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KampusKuAja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Link ke CSS Bootstrap -->
  
  <style>
    /* Gaya kustom */
    .navbar-dark .navbar-nav .nav-link:hover {
      color: #ffffff;
      background-color: #343a40;
    }
    
    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      background-color: #343a40;
      color: white;
      padding: 15px 0;
    }

  </style>
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
    <!-- Navbar Akhir-->
  <div class="container mt-5 d-flex flex-column justify-content-between">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-6 text-center">
            <h3>Hasil Data Pendaftaran Beasiswa Terbaru</h3>
          </div>
        </div>

        <?php if (isset($_GET['status']) && $_GET['status'] == 'deletesuccess') : ?>
          <div class="alert alert-danger" role="alert" style="background-color: #f8d7da; color: #721c24;">
            Data Berhasil dihapus
          </div>
        <?php elseif (isset($_GET['status']) && $_GET['status'] == 'updatesuccess') : ?>
          <div class="alert alert-success" role="alert" style="background-color: #d1e7dd; color: #155724;">
            Status berhasil diubah
          </div>
        <?php endif; ?>
        <!-- Pesan sukses atau berhasil -->
        
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Email</th>
              <th scope="col">No HP</th>
              <th scope="col">IPK</th>
              <th scope="col">Jenis Beasiswa</th>
              <th scope="col">Status Ajuan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              // Query untuk mengambil data dari database
              $query = "SELECT * FROM pendaftaran_beasiswa";
              $sql = mysqli_query($db, $query);
              
              // Loop untuk menampilkan data
              while ($pendaftaran_beasiswa = mysqli_fetch_array($sql)) :
            ?>
            <tr>
              <td><?= $i; $i++; ?></td>
              <td><?= $pendaftaran_beasiswa['nama'] ?></td>
              <td><?= $pendaftaran_beasiswa['email'] ?></td>
              <td><?= isset($pendaftaran_beasiswa['nomor_hp']) ? $pendaftaran_beasiswa['nomor_hp'] : '' ?></td>
              <td><?= $pendaftaran_beasiswa['ipk'] ?></td>
              <td><?= $pendaftaran_beasiswa['beasiswa'] ?></td>
              <td><?= $pendaftaran_beasiswa['status_ajuan'] == 'belum di verifikasi' ? 'Belum Diverifikasi' : 'Terverifikasi' ?></td>
              <td>
                <!-- Link untuk mengedit status dan menghapus data -->
                <a href="edit_status.php?edit=<?= $pendaftaran_beasiswa['id'] ?>" class="btn btn-success btn-sm text-white">Verifikasi</a>
                <a href="delete.php?destroy=<?= $pendaftaran_beasiswa['id'] ?>" class="btn btn-danger btn-sm text-white">Delete</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

        <!-- Tombol untuk menuju halaman grafik -->
        <div class="text-center mt-4">
          <a href="grafik.php" class="btn btn-primary">Lihat Grafik</a>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2023 KampuskuAja. All Rights Reserved.</p>
    </div>
  </footer>
  <!-- Footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw7f+uaOV9W4a/4YfOCBq3Ff2Jf8a0xhMl9tfv7X8e3mIa/d8J6B5Skq5th7I" crossorigin="anonymous"></script>
</body>
</html>
