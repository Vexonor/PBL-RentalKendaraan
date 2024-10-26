<?php
// include database connection file
include 'koneksi.php';
$user_id= $_POST['user_id'];
$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];
$tanggal=$_POST['tanggal'];
$nik=$_POST['nik'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];
$result = mysqli_query($koneksi, "UPDATE user SET
nama='$nama',no_hp='$no_hp',tanggal='$tanggal',nik='$nik',email='$email', password='$password', role='$role' WHERE user_id='$user_id'");
// Redirect to homepage to display updated user in list
header("Location: admin_user.php");
?>