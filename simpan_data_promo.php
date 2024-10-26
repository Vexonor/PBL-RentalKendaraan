<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$gambar = $_POST['gambar'];
$kode = $_POST['kode'];
$diskon = $_POST['diskon'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];

$query = "INSERT INTO promo (gambar, nama, kode, diskon, deskripsi, stok) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($koneksi, $query);


mysqli_stmt_bind_param($stmt, "ssssss", $gambar, $nama, $kode, $diskon, $deskripsi, $stok);


$result = mysqli_stmt_execute($stmt);

if ($result) {
echo "Data Berhasil Disimpan";
header("location:admin_promo.php");
} else {
echo "Gagal Disimpan";
}


mysqli_stmt_close($stmt);
?>