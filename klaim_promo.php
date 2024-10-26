<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["promoId"])) {
    $promoId = $_POST["promoId"];
    $user_id = $_SESSION["user_id"];


    // Panggil fungsi klaimPromo dengan user_id dan promoId
    klaimPromo($user_id, $promoId, $koneksi);
} else {
    // Handle kesalahan jika parameter tidak sesuai
    showBootstrapAlert('error', 'Invalid request');
    header('Location: home.php');
    exit();
}

// Fungsi untuk klaim promo
function klaimPromo($user_id, $promoId, $koneksi) {
    // Lakukan logika klaim promo di sini
    $promoAlreadyClaimed = checkPromoClaimStatus($user_id, $promoId, $koneksi);

    if ($promoAlreadyClaimed) {
        // Menampilkan alert kesalahan
        showBootstrapAlert('danger', 'Anda sudah klaim promo ini sebelumnya.');
    } else {
        // Misalnya, simpan klaim ke dalam database
        $query = "INSERT INTO klaim (user_id, promo_id, status) VALUES ('$user_id', '$promoId', 'Belum Digunakan')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $updateQuery = "UPDATE klaim SET status = 'Belum Digunakan' WHERE user_id = '$user_id' AND promo_id = '$promoId'";

            
            $updateResult = mysqli_query($koneksi, $updateQuery);

            if ($updateResult) {
                // Update informasi promo (misalnya, jumlah klaim) jika diperlukan
                updatePromoInformation($promoId, $koneksi);
                // Menampilkan alert sukses
                showBootstrapAlert('success', 'Klaim promo berhasil!');
            } else {
                // Menampilkan alert kesalahan
                showBootstrapAlert('danger', 'Gagal melakukan klaim promo.');
            }
        } else {
            // Menampilkan alert kesalahan
            showBootstrapAlert('danger', 'Gagal melakukan klaim promo.');
        }
    }

    header('Location: home.php');
    exit();
}

// Fungsi untuk menampilkan alert Bootstrap
function showBootstrapAlert($type, $message) {
    echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
          </div>";
}

// Fungsi untuk memeriksa apakah pengguna sudah klaim promo ini sebelumnya
function checkPromoClaimStatus($user_id, $promoId, $koneksi) {
    // Query untuk memeriksa apakah promo sudah diklaim oleh pengguna
    $query = "SELECT * FROM klaim WHERE user_id = '$user_id' AND promo_id = '$promoId'";
    $result = mysqli_query($koneksi, $query);

    // Mengembalikan true jika promo sudah diklaim, false jika belum
    return mysqli_num_rows($result) > 0;
}

// Fungsi untuk memperbarui informasi promo setelah klaim berhasil
function updatePromoInformation($promoId, $koneksi) {
    // Implementasi logika untuk memperbarui informasi promo
    // Misalnya, update jumlah klaim promo di dalam database
    // ...
}
?>