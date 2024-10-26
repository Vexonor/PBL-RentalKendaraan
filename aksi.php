<?php

include("koneksi.php");



if (isset($_POST['submit'])) {

    $aksi = "Start"; 
    
    $confirm_id = $_POST['confirm_id'];

    $query = "UPDATE konfirmasi SET aksi = '$aksi' WHERE confirm_id = '$confirm_id'";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        header("Location:admin_konfirmasi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}


?>