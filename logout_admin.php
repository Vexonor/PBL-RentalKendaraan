<?php
session_start();

if (isset($_SESSION["email"]) && $_SESSION["password"]) {
header("location:login-daftar.php");
exit; 
}
    session_unset();   
    session_destroy();
header("location:login-daftar.php");
exit();
?>