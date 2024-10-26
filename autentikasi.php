<?php
session_start();
include("koneksi.php");

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

if(mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_array($query);
    
    if(password_verify($password, $row["password"])) {
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["gambarProfile"] = $row["gambarProfile"];
        $_SESSION["nama"] = $row["nama"];
        $_SESSION["no_hp"] = $row["no_hp"];
        $_SESSION["tanggal"] = $row["tanggal"];
        $_SESSION["nik"] = $row["nik"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["password"] = $row["password"];
        $_SESSION["role"] = $row["role"];
        
            if($row["role"] == "Buyer") {
                header("location:home.php");
            }
            elseif ($row["role"] == "Seller"){
                header("location:admin_new.php");
            }
            else{
               $errorMessage = "Email Atau Password Salah <img src='assets/no-unscreen.gif' width='30'>";
    header("location: login-daftar.php?error_message=" . urlencode($errorMessage));
            }
    }
    else{
       $errorMessage = "Akun Anda Belum Terdaftar <img src='assets/no-unscreen.gif' width='30'>";
    header("location: login-daftar.php?error_message=" . urlencode($errorMessage));
    }
}
else{
   $errorMessage = "Akun Anda Belum Terdaftar <img src='assets/no-unscreen.gif' width='30'>";
    header("location: login-daftar.php?error_message=" . urlencode($errorMessage));
}  

?>