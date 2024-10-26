<?php

include("koneksi.php");

if (isset($_POST['submit'])) {

    $persetujuan = "Disetujui"; 

    $confirm_id = $_POST['confirm_id'];


    $query = "UPDATE konfirmasi SET persetujuan = '$persetujuan' WHERE confirm_id = '$confirm_id'";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        header("Location: admin_konfirmasi.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>