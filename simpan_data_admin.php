<?php
include 'koneksi.php';

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = "INSERT INTO user_admin (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password);
        

        $result = mysqli_stmt_execute($stmt);
        

        if ($result) {
            echo "Data Berhasil Disimpan";
            header("location: admin_admin.php");
        } else {
            echo "Gagal Disimpan";
        }
        

        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal Menyiapkan Statement";
    }
} else {
    echo "Semua Data Harus Diisi";
}
?>