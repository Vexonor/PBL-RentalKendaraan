<?php
// include database connection file
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM user_admin WHERE adminID='$id'");
header("Location:admin_admin.php");
?>