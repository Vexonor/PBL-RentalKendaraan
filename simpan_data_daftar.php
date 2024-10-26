<?php
include 'koneksi.php';

$gambarProfile = mysqli_real_escape_string($koneksi, $_POST['gambarProfile']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$no = mysqli_real_escape_string($koneksi, $_POST['no']);
$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);

$cek_email_query = "SELECT * FROM user WHERE email = '$email'";
$cek_email_result = mysqli_query($koneksi, $cek_email_query);

if (mysqli_num_rows($cek_email_result) > 0) {
    $errorMessage = "Email sudah terdaftar. Silakan gunakan email lain <img src='assets/no-unscreen.gif' width='30'>";
    header("location: login-daftar.php?error_message=" . urlencode($errorMessage));
} else {

    $query = "INSERT INTO user (gambarProfile, nama, no_hp, tanggal, nik, email, password, role)
              VALUES ('$gambarProfile', '$nama', '$no', '$tanggal', '$nik', '$email', '$password', 'Buyer')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data Berhasil Disimpan";
        header("location: login-daftar.php");
    } else {
        echo "Gagal Disimpan";

        echo mysqli_error($koneksi);
    }
}

?>