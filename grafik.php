<?php
// Make sure to include the 'config.php' file
include 'config.php';

// Define functions at the top of the script
function totalData($akademik, $nonakademik)
{
    $total = $akademik + $nonakademik;
    return $total;
}

// Hitung Jumlah Data penerima beasiswa akademik
$queryAkademik = "SELECT COUNT(*) FROM `pendaftaran_beasiswa` WHERE beasiswa = 'akademik'";
$sqlAkademik = mysqli_query($db, $queryAkademik);
$akademik = mysqli_fetch_assoc($sqlAkademik);
$jmlAkademik = $akademik['COUNT(*)'];

// Hitung jumlah data penerima beasiswa non akademik
$queryNonakademik = "SELECT COUNT(*) FROM `pendaftaran_beasiswa` WHERE beasiswa = 'non-akademik'";
$sqlNonakademik = mysqli_query($db, $queryNonakademik);
$nonakademik = mysqli_fetch_assoc($sqlNonakademik);
$jmlNonakademik = $nonakademik['COUNT(*)'];

// Calculate the total count
$total = totalData($jmlAkademik, $jmlNonakademik);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for navbar hover effects -->
    <style>
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #ffffff;
            background-color: #343a40;
        }
        /* Add top margin to create space between navbar and content */
        .content-section {
            margin-top: 80px; /* Adjust this value as needed */
        }
    </style>
    <title>KampusKuAja</title>
</head>

<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin-left: 30px;">Pilihan Beasiswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="pendaftaran.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#hasil"
                            style="margin-right: 205px;">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="content-section">
        <h1 class="text-center mt-3">Grafik Pendaftar Beasiswa</h1>
        <p class="text-center">Banyak Data <?= $total; ?></p>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <!-- Tampil Chart -->
                    <div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>
                    <a href="hasil.php" class="btn btn-primary d-block">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Chart script and other JavaScript includes -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Set Data
        const data = google.visualization.arrayToDataTable([
            ['Beasiswa', 'Jumlah'],
            ['Akademik', <?= $jmlAkademik ?>],
            ['Non Akademik', <?= $jmlNonakademik ?>],
        ]);

        // Set Options
        const options = {
            title: 'Grafik Jumlah Penerima Beasiswa',
            is3D: true, // Add this line to make it a 3D pie chart
        };

        // Draw
        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; <?= date('Y'); ?> KampuskuAja. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>