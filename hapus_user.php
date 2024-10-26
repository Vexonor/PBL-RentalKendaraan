<?php
// include database connection file
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$id'");
header("Location:admin_user.php");
?>