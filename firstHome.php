<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Focalors Rent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Gabarito:wght@600&family=Kanit:wght@700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
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
        <nav class="navbar fixed-top ">
            <div class="container-fluid">
                <img src="assets/logo 1.png" alt="Focalors Rent" />
                <center><a class="navbar-brand" href="#"><strong>Focalors</strong> Rent</a></center>
                <a href="login-daftar.php">
                    <button class="btn btn-primary"><strong>Log In</strong></button>
                </a>


            </div><br><br>
            <hr>

    </div>
    </div>
    </nav><br><br><br>
    <!-- Navbar -->

    <!-- Carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/image1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block "
                    style="background-color: rgba(128, 128, 128, 0.5); border-radius: 20px;">
                    <h5 class="heading" style="padding: 10px 0 0 0;">SELAMAT DATANG DI FOCALORS
                        RENT
                        <img src="assets/wave-unscreen.gif" alt="" width="40" class="hand-gif">
                    </h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/image2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/image3.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/image4.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/image5.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br><br>
    <!-- Carousel -->
    <center>
        <h2>PROMO</h2>
    </center> <br>
    <!-- Promo -->
    <div class="container-fluid">
        <div class="row">

            <?php
                  include 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM `promo`");
                  while ($data = mysqli_fetch_assoc($query)) {
                    $promoId = $data['promoID'];
                ?>
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="image/<?php echo $data['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" id="title-promo">
                                <h5 class="card-title"><?php echo $data['nama']; ?></h5>
                                <p class="card-text card-description"><?php echo $data['deskripsi']?></p>
                                <form action="klaim_promo.php" method="post">
                                    <input type="hidden" name="promoId" value="<?php echo $promoId; ?>">

                                </form>
                                <?php
                                // Set alert setelah klaim promo
                                if (isset($_SESSION['bootstrap_alert'])) {
                                    echo $_SESSION['bootstrap_alert'];
                                    unset($_SESSION['bootstrap_alert']); // Hapus pesan alert setelah ditampilkan
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>




    <br><br><br><br>


    <!-- Promo -->
    <center>
        <h2>KENDARAAN UNTUK ANDA</h2>
    </center> <br>
    <!-- Rekomendasi -->
    <div class="container-fluid">
        <div class="row mb-5 py-5  justify-content-around">
            <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM kendaraan ORDER BY RAND() LIMIT 4";
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
            <div class="card text-center">
                <div class="card-header">
                    Focalors Rent
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Maaf Untuk Saat Ini Kendaraan Belum Tersedia
                            <img src="assets/emotions-unscreen.gif" alt="" width="50">
                        </p>

                    </blockquote>
                </div>
            </div>
            <?php
                            endif;
                            foreach ($query as $key => $value) :
                                $productID = $value['productID'];
                            ?>

            <div class="col mb-5 mx-2">
                <div class="card mx-auto" id="card" style="width: 18rem;">
                    <img src="product/<?= htmlspecialchars( $value['gambar'] ) ?>" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars( $value['namaProduct'] ) ?></h5>
                        <h5 class="card-title">
                            <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?><?php echo " /Hari"?>
                        </h5>
                        <div class="mb-2 d-flex justify-content-start" id="action-btn">
                            <ul>
                                <li> <button type="button" class="btn btn-primary" id="detail-btn"
                                        data-bs-toggle="modal" data-bs-target="#modalDetail<?= $productID ?>"
                                        style="transform:translateX(70px);">
                                        Detail
                                    </button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail -->
            <div class="modal fade" id="modalDetail<?= $productID ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kendaraan <img
                                    src="assets/steering-wheel-unscreen.gif" alt="" width="50">
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modal-detail">

                            <p><strong> <?= htmlspecialchars( $value['detail'] ) ?></strong></p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail -->



            <?php
        endforeach;
        ?>

        </div>
    </div>
    <!-- Rekomendasi -->

    </div>
    <!-- Footer -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <img src="assets/logo 1.png" alt="">
                        <a class="navbar-brand" href="reworkHome.html"><strong>Focalors</strong>
                            Rent</a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box-1">
                        <h2>Find Us On :</h2>
                        <ul>
                            <li><a class="nav-link" href="#"><i class="fa-brands fa-square-facebook"></i></a>
                            </li>
                            <li> <a class="nav-link" href="https://instagram.com/lonedriftss?igshid=OGQ5ZDc2ODk2ZA=="><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a class="nav-link" href="#"><i class="fa-brands fa-youtube"></i></a>
                            </li>
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
                        <p>Focalors rent adalah sebuah Aplikasi berbasis web yang di rancang untuk
                            memfasilitasi
                            penyewaan kendaraan dan jasa yang terkait transportasi untuk tujuan
                            seperti
                            keberangkatan ke
                            suatu tempat atau ke luar daerah seperti kunjungan keluarga, rekreasi,
                            mudik,
                            dan lainnya.
                            Aplikasi ini juga memungkinkan konsumen untuk menyewa berbagai jenis
                            kendaraan
                            seperti mobil
                            atau motor.</p>
                        <div class="input-group mb-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer -->






</body>

</html>