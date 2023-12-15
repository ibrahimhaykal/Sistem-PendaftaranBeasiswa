<?php include 'add_ipk.php'; ?>
<!DOCTYPE html>
<html lang="en">

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
  </style>
  <title>KampusKuAja</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" style="margin-left: 30px;">Pilihan Beasiswa</a>
      <!-- Navbar Toggle Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <!-- Navigation Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#daftar">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="hasil.php" style="margin-right: 205px;">Hasil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Main Content -->
  <main class="bg-light">
    <!-- Main Section -->
    <section id="main">
      <div class="position-relative overflow-hidden p-9 p-md-4 m-md-1 text-center bg-light">
        <div class="col-md-5 p-lg-6 mx-auto my-5">
          <h1 class="display-5 fw-normal">Selamat Datang Di pilihan Beasiswa</h1><br>
          <p class="lead fw-normal">temukan berbagai Jenis Beasiswa untuk mewujudkan impian pendidikan anda</p>
          <a class="btn btn-outline-secondary" href="#daftar"> Daftar</a>
        </div>
      </div>
    </section>
    <!-- Daftar Section -->
    <section id="daftar" class="py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card p-4">
              <h2 class="card-title text-center">Daftar Beasiswa</h2>
              <p class="card-text text-center">Di sini Anda dapat mendaftar untuk berbagai jenis beasiswa yang tersedia.</p>
              <form id="form-pendaftaran" method="post" action="process_daftar.php">
                <!-- Form fields here -->
                <div class="mb-3">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="nomor-hp">Nomor HP</label>
                  <input type="tel" class="form-control" id="nomor-hp" name="nomor_hp" pattern="[0-9]{10,12}" required>
                </div>
                <div class="mb-3">
                  <label for="semester">Semester Saat Ini</label>
                  <select class="form-control" id="semester" name="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="ipk">IPK</label>
                  <input type="number" class="form-control" id="ipk" name="ipk" step="0.01" readonly>
                </div>
                <div class="mb-3">
                  <label for="beasiswa">Pilih Beasiswa</label>
                  <!-- Disable Beasiswa selection based on IPK -->
                  <select class="form-control" id="beasiswa" name="beasiswa" required>
                    <option value="">Pilih Beasiswa</option>
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non-Akademik</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="berkas">Unggah Berkas</label>
                  <!-- Disable Berkas upload based on IPK -->
                  <input type="file" class="form-control" id="berkas" name="berkas" accept=".pdf,.jpg,.jpeg,.png,.zip" <?php if (defined('IPK') && IPK < 3) echo 'disabled'; ?> required>
                </div>
                <!-- Show message if IPK is less than 3 -->
                <?php if (defined('IPK') && IPK < 3): ?>
                  <p class="text-danger">Anda tidak memenuhi syarat untuk mendaftar beasiswa karena IPK kurang dari 3.</p>
                <?php endif; ?>
                <!-- Submit and Reset Buttons -->
                <button type="submit" class="btn btn-primary" <?php if (defined('IPK') && IPK < 3) echo 'disabled'; ?>>Daftar</button>
                <input type="reset" class="btn btn-primary">
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Footer Section -->
<footer class="bg-dark text-white py-4">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-3">
        <!-- Kosongkan untuk menciptakan ruang kosong di sisi kiri -->
      </div>
      <div class="col-md-6">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="text-white">Home</a></li>
          <li class="list-inline-item"><a href="#beasiswa" class="text-white">Beasiswa</a></li>
          <li class="list-inline-item"><a href="#tentang-kami" class="text-white">Tentang Kami</a></li>
          <li class="list-inline-item"><a href="#daftar-beasiswa" class="text-white">Daftar Beasiswa</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <!-- Kosongkan untuk menciptakan ruang kosong di sisi kanan -->
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2023 KampuskuAja. All Rights Reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- Optional: JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw7f+uaOV9W4a/4YfOCBq3Ff2Jf8a0xhMl9tfv7X8e3mIa/d8J6B5Skq5th7I" crossorigin="anonymous"></script>
</body>
</html>
