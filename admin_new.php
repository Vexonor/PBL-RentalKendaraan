<?php
session_start();

if (!isset($_SESSION["nama"]) || !isset($_SESSION["role"]) || $_SESSION["role"] == "Buyer") {
    header("location:login-daftar.php");
    exit;
}

$nama = $_SESSION["nama"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="stylesheet" href="admin-new.css">
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/logo.png" alt="Focalors" width="250"></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text mx-auto">
                    WELCOME <?php echo $nama;?>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row no-gutters mt-3">
            <div class="col-md-2  pr-3">
                <ul class="nav flex-column ml-3 mb-5">
                    <li class="nav-item">
                        <a class="nav-link active text-white text-center bg-primary " href="admin_new.php"
                            style="border-radius:70px 40px; height: 45px; padding-top: 10px;"><i
                                class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <hr class="bg-secondary" id="hr-dashboard">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_user.php"><i class="fas fa-users mr-2"></i>Daftar
                            User</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_kendaraan.php"><i class="fas fa-car ml-2"></i>
                            Kendaraan</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_konfirmasi.php">
                            <i class="fas fa-clipboard-list ml-2"></i>Konfirmasi
                        </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_promo.php"><i class="fas fa-tags mr-2"></i>Daftar
                            Promo</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php"><i
                                class="fas fa-right-from-bracket mr-2"></i>Log Out
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 p-5 pt-2">
                <h3 class="judul mb-5"><img src="assets/php-unscreen.gif" alt="" width="50">Dashboard
                </h3>

                <div class="container mt-4">
                    <div class="row">

                        <div class="col-md-4 ">
                            <a href="admin_user.php">
                                <div class="card mb-3" id="card-user">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/user-unscreen.gif" class="img-fluid rounded-start"
                                                alt="..." width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM user WHERE role = 'Buyer'";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Buyer</h5>';
                        echo '<p class="card-text">Total Data: ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-4 ">
                            <a href="admin_kendaraan.php">
                                <div class="card mb-3" id="card-mobil">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/car-unscreen.gif" class="img-fluid rounded-start" alt="..."
                                                width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM kendaraan WHERE jenis = 'Mobil'";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Mobil</h5>';
                        echo '<p class="card-text">Total Data: ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 ">
                            <a href="admin_kendaraan.php">
                                <div class="card mb-3" id="card-motor">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/motorcycle-unscreen.gif" class="img-fluid rounded-start"
                                                alt="..." width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM kendaraan WHERE jenis = 'Motor'";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Motor</h5>';
                        echo '<p class="card-text">Total Data: ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="row mt-3 ">

                        <div class="col-md-4 ">
                            <a href="admin_user.php">
                                <div class="card mb-3" id="card-seller">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/presentation-unscreen.gif" class="img-fluid rounded-start"
                                                alt="..." width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM user WHERE role = 'Seller'";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Seller</h5>';
                        echo '<p class="card-text">Total Data: ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 ">
                            <a href="admin_konfirmasi.php">
                                <div class="card mb-3" id="card-konfirmasi">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/voting-unscreen.gif" class="img-fluid rounded-start"
                                                alt="..." width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM konfirmasi";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Konfirmasi</h5>';
                        echo '<p class="card-text">Total Data: ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 ">
                            <a href="admin_promo.php">
                                <div class="card mb-3" id="card-promo">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="assets/price-tag-unscreen.gif" class="img-fluid rounded-start"
                                                alt="..." width="100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <?php
                    include "koneksi.php";

                    // Mengambil data dari database
                    $sql = "SELECT COUNT(*) AS total FROM promo";
                    $result = $koneksi->query($sql);

                    if ($result) {
                        $row = $result->fetch_assoc();
                        $totalData = $row["total"];

                        // Menampilkan data pada card
                        echo '<h5 class="card-title">Data Promo</h5>';
                        echo '<p class="card-text">Total Data : ' . $totalData . '</p>';
                    } else {
                        echo "Error: " . $koneksi->error;
                    }

                    // Menutup koneksi
                    $koneksi->close();
                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </a>
                    </div>

                </div>




            </div>
        </div>





</body>

</html>