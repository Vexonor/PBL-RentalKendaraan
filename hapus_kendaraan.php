<?php
// include database connection file
include 'koneksi.php';
$productID = $_GET['productID'];
$result = mysqli_query($koneksi, "DELETE FROM kendaraan WHERE productID='$productID'");
header("Location:admin_mobil_motor.php");
?>