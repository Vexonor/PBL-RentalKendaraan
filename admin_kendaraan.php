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
                        <a class="nav-link active text-white" href="admin_new.php"><i
                                class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_user.php"><i class="fas fa-users mr-2"></i>Daftar
                            User</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_kendaraan.php"><i class="fas fa-car ml-2"></i>
                            Kendaraan</a>

                        <a href="admin_mobil_motor.php">
                            <button class="btn btn-primary" type="button">
                                Tambah Kendaraan
                            </button>
                        </a>

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
                <h3><img src="assets/steering-wheel-unscreen.gif" alt="" width="50">Daftar
                    Kendaraan</h3> <br><br><br>
                <h3><img src="assets/car-unscreen.gif" alt="" width="50">Daftar
                    Kendaraan Mobil</h3>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">GAMBAR KENDARAAN</th>
                            <th scope="col">NAMA KENDARAAN</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">STOK</th>

                        </tr>
                    </thead>
                    <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM kendaraan WHERE jenis='Mobil'";
                            $no = 1;
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
                    <tr>
                        <td colspan="100%">Tidak ada data yang ditemukan !</td>
                    </tr>
                    <?php
                            endif;
                            foreach ($query as $key => $value) :
                            ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td align="center">
                            <img src="product/<?= htmlspecialchars( $value['gambar'] ) ?>" width="50" alt="">
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['namaProduct'] ) ?>
                        </td>
                        <td>
                            <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['stok'] ) ?>
                        </td>

                    </tr>

                    <?php
        endforeach;
        ?>
                </table>
                <br><br><br>
                <h3><img src="assets/motorcycle-unscreen.gif" alt="" width="50">Daftar
                    Kendaraan Motor</h3>
                <hr>
                <table class="table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">GAMBAR KENDARAAN</th>
                            <th scope="col">NAMA KENDARAAN</th>
                            <th scope="col">HARGA</th>
                            <th scope="col">STOK</th>

                        </tr>
                    </thead>
                    <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM kendaraan WHERE jenis='Motor'";
                            $no = 1;
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
                    <tr>
                        <td colspan="100%">Tidak ada data yang ditemukan !</td>
                    </tr>
                    <?php
                            endif;
                            foreach ($query as $key => $value) :
                            ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td align="center">
                            <img src="product/<?= htmlspecialchars( $value['gambar'] ) ?>" width="50" alt="">
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['namaProduct'] ) ?>
                        </td>
                        <td>
                            <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['stok'] ) ?>
                        </td>

                    </tr>

                    <?php
        endforeach;
        ?>
                </table>



            </div>


        </div>

</body>

</html>