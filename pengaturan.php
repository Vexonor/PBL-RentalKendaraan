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
$password = $_SESSION["password"];

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
    <link
        href="https://fonts.googleapis.com/css2?family=Gabarito:wght@600&family=Kanit:wght@700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="test.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</head>

<body class="body-pengaturan">
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
                                <a class="nav-link active" aria-current="page" href="notifikasi.php"><i
                                        class="fa-solid fa-bell"></i>NOTIFIKASI</a>
                                <hr>
                            </li>
                            <li class="nav-item" id="bar-pengaturan">
                                <a class="nav-link bg-secondary" aria-current="page" href="home.php"
                                    style="border-radius: 50px;">
                                    <img src="assets/settings-unscreen.gif" class="mx-3" alt="" width="50"><strong
                                        class="mx-2">PENGATURAN</strong></a>
                                <hr>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav> <br><br><br><br>
        <!-- Navbar -->
        <center>
            <h2>PENGATURAN<img src="assets/icons8-automation.gif" alt=""></h2>
        </center> <br>
        <!-- Data  -->
        <div class="card mx-auto mb-5">

            <img src="profile/<?php echo $gambarProfile; ?>" class="card-img-top" alt="" id="setting-profile">
            <hr>
            <div class="card-body">
                <h5 class="card-title"><strong>DATA DIRI</strong></h5>

                <ul>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="<?php echo $nama;?>" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="<?php echo $no_hp;?>" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="<?php echo $tanggal;?>" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="<?php echo $nik;?>" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="<?php echo $email;?>" readonly>
                        </div>
                    </li>
                    <li>
                        <div class="input-group flex-nowrap">
                            <input type="password" class="form-control" aria-label="Username"
                                aria-describedby="addon-wrapping" value="********" <?php echo $password;?>" readonly>
                        </div>
                    </li>
                    <li class="btn-action">
                        <a href="logout.php">
                            <button type=" button" class="btn btn-danger" id="btn-logout"><i
                                    class="fas fa-sign-out"></i>Logout</button>
                        </a>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fas fa-edit"></i>Edit
                        </button>
                    </li>
                </ul>

            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="update_user.php" method="post" role="form" enctype="multipart/form-data">
                        <div class=" form-group">
                            <div class="row">
                                <div class="col-sm-8"> <input type="hidden" name="user_id"
                                        value="<?php echo $user_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Nama </label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                                        value="<?php echo $nama; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Foto Profil </label>
                                <div class="col-sm-8"><input type="file" class="form-control" name="gambarProfile"
                                        value="<?php echo $gambarProfile; ?>">
                                    <input type="hidden" name="gambarProfileFill"
                                        value="<?php echo  $gambarProfile; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">No. Handphone</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="no_hp"
                                        value="<?php echo $no_hp; ?>"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Tanggal Lahir </label>
                                <div class="col-sm-8"><input type="date" name="tanggal" class="form-control"
                                        value="<?php echo $tanggal; ?>">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">NIK</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nik"
                                        value="<?php echo $nik; ?>"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Email</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="email"
                                        value="<?php echo $email; ?>"></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Password</label>
                                <div class=" col-sm-8"><input type="password" class="form-control" id="pass"
                                        name="password" value="<?php echo $password ?>" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <!-- Data  -->

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
</body>
<script>
// Edit Password

var pass = document.getElementById("pass");
var toggler2 = document.getElementById("toggle2-password");



toggler2.addEventListener("click", hideShowPassword2);


function hideShowPassword2() {
    if (pass.type == "password") {
        pass.setAttribute("type", "text")
        toggler2.classList.remove("fa-eye-slash")
        toggler2.classList.add("fa-eye")
    } else {
        pass.setAttribute("type", "password")
        toggler2.classList.remove("fa-eye")
        toggler2.classList.add("fa-eye-slash")
    }
}
</script>

</html>