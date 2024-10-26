<?php
include 'koneksi.php';

$gambar = mysqli_real_escape_string($koneksi, $_POST['gambar']);
$namaProduct = mysqli_real_escape_string($koneksi, $_POST['namaProduct']);
$jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
$harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
$stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
$detail = mysqli_real_escape_string($koneksi, $_POST['detail']);

// Gunakan prepared statement
$stmt = $koneksi->prepare("INSERT INTO kendaraan (gambar, namaProduct, jenis, harga, stok, detail) 
                           VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $gambar, $namaProduct, $jenis, $harga, $stok, $detail);

if ($stmt->execute()) {
    echo "Data Berhasil Disimpan";
    header("location:admin_mobil_motor.php");
} else {
    echo "Gagal Disimpan";
}

$stmt->close();
$koneksi->close();
?>