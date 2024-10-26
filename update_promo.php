<?php
// include database connection file
include 'koneksi.php';
$promoID = $_POST['promoID'];
$nama = $_POST['nama'];
$gambar = $_POST['gambar'];
$gambarProduct = $_POST['gambar'];
    if (empty($gambar)) {
        $gambar = $gambarProduct;
    }
$kode= $_POST['kode'];
$diskon = $_POST['diskon'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$result = mysqli_query($koneksi, "UPDATE promo SET
gambar='$gambar',nama='$nama',kode='$kode', diskon='$diskon', deskripsi='$deskripsi', stok='$stok'   WHERE promoID='$promoID'");
// Redirect to homepage to display updated user in list
header("Location: admin_promo.php");
?>