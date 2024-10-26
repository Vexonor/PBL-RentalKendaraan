<?php
if(isset($_GET['error_message'])) {
    $errorMessage = $_GET['error_message'];
    echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-daftar.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <title>Sign In</title>
</head>

<body>
    <div class="wrap" id="container">
        <div class="form-container sign-up">
            <div class="daftar">
                <form method="post" action="simpan_data_daftar.php" role="form">
                    <h1>DAFTAR</h1>
                    <input type="hidden" class="nama" name="gambarProfile" id="" value="icons8-user-48.png">
                    <input type="text" class="nama" name="nama" id="" required="required">
                    <label for="" class="nama1">Nama</label>
                    <input type="hidden" class="nama" name="gambar" id="" required="required">
                    <label for="" class="nama1">Nama</label>
                    <input type="number" class="hp" name="no" id="" required="required">
                    <label for="" class="no">No. Hp</label>
                    <input type="date" class="usia" name="tanggal" id="" required>
                    <label for="" class="usia1">Tanggal Lahir</label>

                    <input type="number" class="nik" name="nik" id="" required="required">
                    <label for="" class="nik1">NIK</label>


                    <input type="text" class="email" name="email" required="required">
                    <label for="" class="labelEmail">Email</label>
                    <input type="password" class="password" id="password" name="password" required="required">
                    <label for="" class="labelPass">Password</label>
                    <span class="show-hide">
                        <i class="fa fa-eye-slash" id="toggle-password"></i>
                    </span>
                    <button type="submit" name="submit" class="btn btn-primary" value="Simpan">Simpan</button>
                </form>
            </div>
        </div>
        <div class="form-container sign-in">
            <div class="login">
                <form method="POST" action="autentikasi.php" role="form">
                    <h1>LOGIN</h1>
                    <input type="text" class="email" name="email" required="required">
                    <label for="" class="labelEmail">Email</label>
                    <input type="password" class="password" id="password1" name="password" required="required">
                    <label for="" class="labelPass">Password</label>
                    <span class="show-hide">
                        <i class="fa fa-eye-slash" id="toggle1-password"></i>
                    </span> <br>
                    <button type="submit" name="submit" class="btn-login" value="Login">Login</button>
                    <a href="firstHome.php" id="btn-back">
                        <button type="button">
                            <i class="fa-solid fa-arrow-left"></i>Kembali
                        </button>
                    </a>
                </form>

            </div>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Sewa dengan Percaya Diri, Hidup dengan Bebas</h1>
                    <button class="hidden" id="login"><i class="fa-solid fa-arrow-left"></i>Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>PILIHAN TERBAIK UNTUK RENTAL ANDA</h1>
                    <p>Belum Memiliki Akun?</p>
                    <button class="hidden" id="register">Daftar <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>