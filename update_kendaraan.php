<?php
// include database connection file
include 'koneksi.php';
$productID = $_POST['productID'];
$gambar = $_POST['gambar'];
$gambarProduct = $_POST['gambarProduct'];
    if (empty($gambar)) {
        $gambar = $gambarProduct;
    }
$namaProduct = $_POST['namaProduct'];
$harga= $_POST['harga'];
$stok= $_POST['stok'];
$detail = $_POST['detail'];
$result = mysqli_query($koneksi, "UPDATE kendaraan SET
gambar='$gambar',namaProduct='$namaProduct',harga='$harga', stok='$stok', detail='$detail'  WHERE productID='$productID'");
// Redirect to homepage to display updated user in list
header("Location: admin_mobil_motor.php");
?>