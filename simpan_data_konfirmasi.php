<?php
include "koneksi.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST["productID"];
    $gambar_product = $_POST["gambar_product"];
    $nama_product = $_POST["nama_product"];
    $nama = $_POST["nama"];
    $user_id = $_POST["user_id"];
    $alamat = $_POST["alamat"];
    $hari = $_POST["hari"];
    $no_hp = $_POST["no_hp"];
    $nik = $_POST["nik"];
    $harga = $_POST["harga"];
    $promo_id = $_POST["promo_id"];
    $total_harga = $_POST["total_harga"];
    $jumlah = 1;

    $sim_name = $_FILES["sim"]["name"];
    $sim_tmp = $_FILES["sim"]["tmp_name"];
    $sim_dest = "uploads/" . $sim_name;
    move_uploaded_file($sim_tmp, $sim_dest);

    $sql = "INSERT INTO konfirmasi (productID, gambar_product, nama_product, nama, user_id, alamat, hari, no_hp, nik, sim, harga, promo_id, total_harga) VALUES ('$productID', '$gambar_product', '$nama_product', '$nama', '$user_id', '$alamat', '$hari', '$no_hp', '$nik', '$sim_dest', '$harga', '$promo_id', '$total_harga')";

    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $sql_update_stok = "UPDATE kendaraan SET stok = stok - $jumlah WHERE productID = '$productID'";
        $result_stok = mysqli_query($koneksi, $sql_update_stok);
        
        header("location:notifikasi.php");
    } else { 
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Formulir tidak dikirim!";
}
?>