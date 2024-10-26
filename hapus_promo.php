<?php
// include database connection file
include 'koneksi.php';
$promoID = $_GET['promoID'];
$result = mysqli_query($koneksi, "DELETE FROM promo WHERE promoID='$promoID'");
header("Location:admin_promo.php");
?>