<?php

include("koneksi.php");

if (isset($_POST['submit'])) {
    $productID = $_POST["productID"];
    $persetujuan = "Tolak"; 
    $jumlah = 1;


    $confirm_id = $_POST['confirm_id'];


    $query = "UPDATE konfirmasi SET persetujuan = '$persetujuan' WHERE confirm_id = '$confirm_id'";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
        $sql_update_stok = "UPDATE kendaraan SET stok = stok + $jumlah WHERE productID = '$productID'";
        $result_stok = mysqli_query($koneksi, $sql_update_stok);
        
        header("Location: admin_konfirmasi.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>