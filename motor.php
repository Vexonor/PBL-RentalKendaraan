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
                                <a class="nav-link dropdown-toggle bg-secondary" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 50px;">
                                    <img src="assets/keys-unscreen.gif" class="mx-3" alt="" width="50"><strong
                                        class="mx-2">KENDARAAN</strong>
                                </a>
                                <hr>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="mobil.php"><i
                                                class="fa-solid fa-car"></i>MOBIL</a>
                                    </li>
                                    <hr class="dropdown-divider" />
                                    <li>
                                        <a class="dropdown-item bg-secondary  active mx-2" href="motor.php"
                                            style="border-radius: 50px; width: 230px; margin:10px 0 0 0;"><img
                                                src="assets/motorcycle-unscreen.gif" class="mx-2" alt=""
                                                width="50"><strong class="mx-4">MOTOR</strong></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="status.php"><i
                                        class="fa-solid fa-clock"></i>STATUS</a>
                                <hr>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="notifikasi.php"><i
                                        class="fa-solid fa-bell"></i>NOTIFIKASI</a>
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
            <h2>GET YOUR MOTORCYCLE <img src="assets/icons8-scooter.gif" alt=""></h2>
        </center> <br>
        <!-- Produk -->
        <div class="container-fluid">
            <div class="row mb-5 py-5  justify-content-around">
                <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM kendaraan WHERE jenis = 'Motor'";
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
                                $stok = $value['stok']; 
                                $isDisabled = ($stok < 1) ? 'disabled' : '';
                                $opacity = ($stok < 1) ? 'opacity: 0.5;' : '';
                            ?>

                <div class="col mb-5 mx-2">
                    <div class="card mx-auto" id="card" style="width: 18rem; <?= $opacity ?>">
                        <img src="product/<?= htmlspecialchars( $value['gambar'] ) ?>" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars( $value['namaProduct'] ) ?></h5>
                            <h5 class="card-title">
                                <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?><?php echo " /Hari"?>
                            </h5>
                            <div class="mb-2 d-flex justify-content-start" id="action-btn">
                                <ul>
                                    <li> <button type="button" class="btn btn-primary" id="detail-btn"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalDetail<?= htmlspecialchars( $value['productID'] ) ?>"
                                            <?= $isDisabled ?>>
                                            Detail
                                        </button></li>
                                    <li> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalConfirm<?= $productID ?>" <?= $isDisabled ?>>
                                            Rental
                                        </button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail -->
                <div class="modal fade" id="modalDetail<?= htmlspecialchars( $value['productID'] ) ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kendaraan <img
                                        src="assets/steering-wheel-unscreen.gif" alt="" width="50">
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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


                <!-- Konfirmasi Rental -->

                <div class="modal fade" id="exampleModalConfirm<?= $productID ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Rental Sekarang <img id="key-gif"
                                        src="assets/key-unscreen.gif" alt="" width="50">
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="simpan_data_konfirmasi.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="user_id" value="<?= htmlspecialchars( $user_id ) ?>">
                                    <input type="hidden" name="productID"
                                        value="<?= htmlspecialchars( $value['productID'] ) ?>">
                                    <input type="hidden" name="gambar_product"
                                        value="<?= htmlspecialchars( $value['gambar'] ) ?>">
                                    <input type="hidden" name="nama_product"
                                        value="<?= htmlspecialchars( $value['namaProduct'] ) ?>">
                                    <input type="hidden" name="nama" value="<?= htmlspecialchars( $nama ) ?>">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/location-unscreen.gif" alt="" width="30">Alamat</span>
                                        <textarea class="form-control" name="alamat" id="" required></textarea>
                                    </div>
                                    <div class=" input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/upcoming-unscreen.gif" alt="" width="30">Berapa Hari
                                        </span>
                                        <input type="number" name="hari" class="form-control"
                                            id="inputHari_<?php echo $productID; ?>" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm"
                                            oninput="hitungTotal(<?php echo $productID; ?>)" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/phone-unscreen.gif" alt="" width="30">No.
                                            HP
                                        </span>
                                        <input type="number" name="no_hp" class="form-control" id="confirm-no"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                            value="<?php echo $no_hp?>" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/card-unscreen.gif" alt="" width="30">NIK
                                        </span>
                                        <input type="number" name="nik" class="form-control" id="confirm-no"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                            placeholder="Masukkan NIK" value="<?php echo $nik?>" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/credit-card-unscreen.gif" alt="" width="30">SIM
                                        </span>
                                        <input type="file" name="sim" class="form-control"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                            accept=".jpg, .jpeg, .png" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/payment-unscreen.gif" alt="" width="30">Harga Rental
                                        </span>
                                        <span class="input-group-text" id="label-rp">Rp.</span>
                                        <input type="number" name="harga" class="form-control"
                                            id="inputHarga_<?php echo $productID; ?>" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm"
                                            value="<?= htmlspecialchars( $value['harga'] ) ?>"
                                            oninput="hitungTotal(<?php echo $productID; ?>)" readonly>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/price-tag-unscreen.gif" alt="" width="30">Promo </span>
                                        <select class="form-select" id="inputPromo_<?php echo $productID; ?>"
                                            name="promo_id" aria-label="Default select example"
                                            onchange="hitungTotal(<?php echo $productID; ?>)">
                                            <option value="0" selected>Pilih Promo</option>
                                            <?php 
                                                        include "koneksi.php";
                                                     // Mengambil data promo yang belum digunakan oleh pengguna
                                                     $sql = "SELECT * FROM promo WHERE promoID IN (
                                                        SELECT promo_id FROM klaim
                                                        WHERE user_id = ? AND status = 'Belum Digunakan')";
                                                $stmt = mysqli_prepare($koneksi, $sql);
                                                mysqli_stmt_bind_param($stmt, "s", $user_id);
                                                mysqli_stmt_execute($stmt);
                                                $query = mysqli_stmt_get_result($stmt);
                                                
                                                
                                                                if (mysqli_num_rows($query) < 1) : ?>
                                            <option value="0" disabled>Tidak Ada Promo Yang Tersedia !</option>
                                            <?php endif;

                                                                foreach ($query as $key => $valuePromo) : ?>
                                            <option value="<?= htmlspecialchars($valuePromo['promoID']) ?>"
                                                data-diskon="<?= htmlspecialchars($valuePromo['diskon']) ?>">
                                                <?= htmlspecialchars($valuePromo['nama']) ?>
                                            </option>
                                            <?php endforeach;
                                                                ?>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img
                                                src="assets/bribery-unscreen.gif" alt="" width="30">Total
                                        </span>
                                        <span class="input-group-text" id="label-rp">Rp.</span>
                                        <input type="text" name="total_harga" class="form-control"
                                            id="inputTotalHarga_<?php echo $productID; ?>"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
                                            value="" readonly>
                                    </div>
                            </div>

                            <div class=" modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input id="rental" type="submit" name="submit" class="btn btn-success"
                                    value="Rental Seakarang">
                                </input>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Konfirmasi Rental -->
                <?php
        endforeach;
        ?>
            </div>
        </div>
        <!-- Produk -->


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

    <script>
    function formatRupiah(angka) {
        var number_string = angka.toString();
        var split = number_string.split('.');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{1,3}/g);

        // Tambahkan titik jika yang diinput lebih dari 3 digit
        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        // Hilangkan angka di belakang koma desimal jika ada
        if (split[1] !== undefined && parseInt(split[1]) !== 0) {
            rupiah += ',' + split[1];
        }

        return rupiah;
    }


    function hitungTotal(productID) {
        var hargaSewa = parseFloat(document.getElementById('inputHarga_' + productID).value);
        var hariSewa = parseInt(document.getElementById('inputHari_' + productID).value);
        var promoSelect = document.getElementById('inputPromo_' + productID);

        // Periksa apakah promo dipilih
        if (promoSelect.value === '0') {
            // Jika tidak ada promo dipilih, diskon disetel ke 0
            var diskon = 0;
        } else {
            // Jika ada promo dipilih, ambil nilai diskon dari atribut data
            var diskon = parseFloat(promoSelect.options[promoSelect.selectedIndex].getAttribute('data-diskon'));
        }

        // Menghitung total harga
        var totalHarga = hargaSewa * hariSewa * (1 - diskon / 100);

        // Format totalHarga tanpa dua digit nol di belakang koma desimal
        var formattedTotalHarga = formatRupiah(totalHarga.toFixed(2));

        // Menetapkan nilai total harga dengan format rupiah
        document.getElementById('inputTotalHarga_' + productID).value = formattedTotalHarga;
    }
    </script>


</body>

</html>