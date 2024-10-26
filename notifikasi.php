<?php
session_start();

if (!isset($_SESSION["nama"])) {
    header("location:firstHome.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$gambarProfile = $_SESSION["gambarProfile"];
$nama = $_SESSION["nama"];
$no_hp = $_SESSION["no_hp"]  ;
$tanggal = $_SESSION["tanggal"] ;
$nik = $_SESSION["nik"] ;
$email = $_SESSION["email"] ;

include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Focalors Rent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <link
        href="https://fonts.googleapis.com/css2?family=Gabarito:wght@600&family=Kanit:wght@700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="icon" type="image/png" href="logo 1.png" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <img src="assets/logo 1.png" alt="Focalors Rent" />
                <center><a class="navbar-brand" href="#"><strong>Focalors</strong> Rent</a></center>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="profile/<?php echo $gambarProfile; ?>" class="card-img-top" alt="" id="photo-profile">
                        <div class="btn-group" id="btn-username">
                            <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php echo $nama;?>
                                </input>
                            </button>
                            <ul class=" dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="logout.php"><i
                                            class="fa-solid fa-right-from-bracket"></i>LOG OUT</a>
                                </li>
                            </ul>

                        </div>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div><br><br>
                    <hr>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.php"><i
                                        class="fa-solid fa-home"></i>HOME</a>
                                <hr>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-key"></i>KENDARAAN
                                </a>
                                <hr>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="mobil.php"><i
                                                class="fa-solid fa-car"></i>MOBIL</a>
                                    </li>
                                    <hr class="dropdown-divider" />
                                    <li>
                                        <a class="dropdown-item" href="motor.php"><i
                                                class="fa-solid fa-motorcycle"></i>MOTOR</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="status.php"><i
                                        class="fa-solid fa-clock"></i>STATUS</a>
                                <hr>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg-secondary" aria-current="page" href="notifikasi.php"
                                    style="border-radius: 50px;">
                                    <img src="assets/notification-unscreen.gif" class="mx-3" alt="" width="50"><strong
                                        class="mx-2">NOTIFIKASI</strong></a>
                                <hr>
                            </li>
                            <li class="nav-item" id="bar-pengaturan">
                                <a class="nav-link active" aria-current="page" href="pengaturan.php"><i
                                        class="fa-solid fa-gear"></i>PENGATURAN</a>
                                <hr>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav> <br><br><br><br>
        <!-- Navbar -->
        <center>
            <h2>NOTIFIKASI <img src="assets/icons8-bell.gif" alt=""></h2>
        </center> <br>
        <!-- Notifikasi -->
        <div class="container-fluid">
            <div class="row mb-5 py-5  justify-content-around">
                <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM konfirmasi WHERE user_id= $user_id AND persetujuan = 'Belum Disetujui' ";
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
                <div class="card mb-5">
                    <div class="card-body text-center">
                        <h6>Anda Tidak Memiliki Satupun Pemberitahuan <img src="assets/emotions-unscreen.gif" alt=""
                                width="30">
                        </h6>
                    </div>
                </div>
                <?php
                            endif;
                            foreach ($query as $key => $value) :
                            ?>
                <div class="col mb-5 mx-2">
                    <div class="card mx-auto" id="card" style="width: 18rem;">
                        <img src="product/<?= htmlspecialchars( $value['gambar_product'] ) ?>" class="card-img"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars( $value['nama_product'] ) ?></h5>
                            <h5 class="card-title">
                                <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?><?php echo " /Hari"?>
                            </h5>
                            <div class="mb-2 d-flex justify-content-start">
                                <ul>
                                    <li> <button type="button" class="btn btn-secondary w-100" style="height: 60px;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModalConfirm<?= $productID ?>" disabled>
                                            Sedang Menunggu Konfirmasi <img src="assets/decision-making-unscreen.gif"
                                                alt="" width="30">
                                        </button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
        endforeach;
        ?>

                <h3><img src="assets/past-unscreen.gif" alt="" width="50">Histori
                </h3>
                <hr>

                <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM konfirmasi WHERE user_id= $user_id AND persetujuan = 'Tolak' ";
                            $query = mysqli_query($koneksi, $sql);
                            foreach ($query as $key => $value) :
                        ?>

                <div class="col mb-5 mx-2">
                    <div class="card mx-auto" id="card" style="width: 18rem;">
                        <img src="product/<?= htmlspecialchars( $value['gambar_product'] ) ?>" class="card-img"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars( $value['nama_product'] ) ?></h5>
                            <h5 class="card-title">
                                <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?><?php echo " /Hari"?>
                            </h5>
                            <div class="mb-2 d-flex justify-content-start">
                                <ul>
                                    <li> <button type="button" class="btn btn-danger w-100" style="height: 60px;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModalConfirm<?= $productID ?>" disabled>
                                            Permintaan Anda Ditolak<img src="assets/stop-unscreen.gif" alt=""
                                                width="30">
                                        </button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
        endforeach;
        ?>

            </div>
        </div>
        <!-- Notifikasi -->

    </div>
    <!-- Footer -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <img src="assets/logo 1.png" alt="">
                        <a class="navbar-brand" href="reworkHome.html"><strong>Focalors</strong> Rent</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box-1">
                        <h2>Find Us On :</h2>
                        <ul>
                            <li><a class="nav-link" href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                            <li> <a class="nav-link" href="https://instagram.com/lonedriftss?igshid=OGQ5ZDc2ODk2ZA=="><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Anggota Kelompok</h2>
                        <ul>
                            <li><a href="#">Irfan Nurfauzi (3312301113)</a></li>
                            <li><a href="#">Shafiq (3312301099)</a></li>
                            <li><a href="#">Aditya Januarizki (3312301104)</a></li>
                            <li><a href="#">Elisa Natalie (3312301107)</a></li>
                            <li><a href="#">Cici Yulita(3312301117)</a></li>
                            <li><a href="#">Mayaindah Novitasary(3312301116)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Tentang Kami</h2>
                        <p>Focalors rent adalah sebuah Aplikasi berbasis web yang di rancang untuk memfasilitasi
                            penyewaan kendaraan dan jasa yang terkait transportasi untuk tujuan seperti keberangkatan ke
                            suatu tempat atau ke luar daerah seperti kunjungan keluarga, rekreasi, mudik, dan lainnya.
                            Aplikasi ini juga memungkinkan konsumen untuk menyewa berbagai jenis kendaraan seperti mobil
                            atau motor.</p>
                        <div class="input-group mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer -->
    <script src="script.js"></script>
</body>

</html>