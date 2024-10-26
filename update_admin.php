<?php
// include database connection file
include 'koneksi.php';
$adminID = isset($_POST['adminID']) ? $_POST['adminID'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$result = mysqli_query($koneksi, "UPDATE user_admin SET
username='$username',email='$email', password='$password' WHERE adminID='$adminID'");
// Redirect to homepage to display updated user in list
header("Location: admin_admin.php");
?>