<?php
include 'koneksi.php';

$user_id = $_POST['user_id'];

// Pemeriksaan apakah file gambar diunggah
if (!empty($_FILES['gambarProfile']['name'])) {
    $gambarProfile = $_FILES['gambarProfile']['name'];
    $gambar_tmp = $_FILES['gambarProfile']['tmp_name'];
    $gambar_dest = "profile/" . $gambarProfile;

    // Pemeriksaan tipe file dan ukuran file
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif']; // jenis file yang diizinkan
    $max_size = 5 * 1024 * 1024; // maksimum 5 MB

    // Mendapatkan ekstensi file
    $file_extension = strtolower(pathinfo($gambar_dest, PATHINFO_EXTENSION));

    // Cek tipe file
    if (!in_array($file_extension, $allowed_types)) {
        die("Error: Hanya file dengan ekstensi JPG, JPEG, PNG, atau GIF yang diizinkan.");
    }

    // Cek ukuran file
    if ($_FILES['gambarProfile']['size'] > $max_size) {
        die("Error: Ukuran file melebihi batas maksimum (5 MB).");
    }

    // Pindahkan file gambar ke lokasi tujuan
    move_uploaded_file($gambar_tmp, $gambar_dest);
} else {
    $gambarProfile = ''; // Tetapkan nilai default jika tidak ada file yang diunggah
}
 
$gambarProfileFill = $_POST['gambarProfileFill'];

// Jika gambar kosong, gunakan gambar profil yang lama
if (empty($gambarProfile)) {
    $gambarProfile = $gambarProfileFill;
}

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$tanggal = $_POST['tanggal'];
$nik = $_POST['nik'];
$email = $_POST['email'];
$password = $_POST['password'];


// Update data menggunakan prepared statement
$stmt = $koneksi->prepare("UPDATE user SET gambarProfile=?, nama=?, no_hp=?, tanggal=?, nik=?, email=?, password=? WHERE user_id=?");
$stmt->bind_param("sssssssi", $gambarProfile, $nama, $no_hp, $tanggal, $nik, $email, $password, $user_id);
$stmt->execute();
$stmt->close();

// Redirect ke beranda untuk menampilkan pengguna yang diperbarui dalam daftar
header("Location: pengaturan.php");
?>