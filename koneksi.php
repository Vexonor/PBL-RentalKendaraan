<?php

$host = "localhost";
$user = "root";
$pass = "";
$focalors = "focalors";

$koneksi = mysqli_connect($host, $user, $pass, $focalors);
if (!$koneksi) {
    echo "Gagal Koneksi : " . die (mysqli_error($koneksi));
}
?>