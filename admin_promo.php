<?php
session_start();

if (!isset($_SESSION["nama"]) || !isset($_SESSION["role"]) || $_SESSION["role"] == "Buyer") {
    header("location:login-daftar.php");
    exit;
}

$nama = $_SESSION["nama"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css" />
    <link rel="stylesheet" href="admin-new.css">
    <link rel="icon" type="image/png" href="assets/logo 1.png" />
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/logo.png" alt="Focalors" width="250"></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text mx-auto">
                    WELCOME <?php echo $nama;?>
                </span>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row no-gutters mt-3">
            <div class="col-md-2  pr-3">
                <ul class="nav flex-column ml-3 mb-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_new.php"><i
                                class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_user.php"><i class="fas fa-users mr-2"></i>Daftar
                            User</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_kendaraan.php"><i class="fas fa-car ml-2"></i>
                            Kendaraan</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_konfirmasi.php">
                            <i class="fas fa-clipboard-list ml-2"></i>Konfirmasi
                        </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white text-center bg-primary" href="admin_promo.php"
                            style="border-radius:70px 40px; height: 45px; padding-top: 10px;"><i
                                class="fas fa-tags mr-2"></i>Daftar
                            Promo</a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="logout.php"><i
                                class="fas fa-right-from-bracket mr-2"></i>Log Out
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10 p-5 pt-2">
                <br><br><br>
                <h3><img src="assets/price-tag-unscreen.gif" alt="" width="50">Daftar
                    Promo</h3>
                <hr>
                <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal"
                    data-bs-target="#modalTambah">
                    <img src="assets/plus-unscreen.gif" alt="" width="25">TAMBAH DATA PROMO
                </button>
                <table class="table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NAMA PROMO</th>
                            <th scope="col">GAMBAR PROMO</th>

                            <th scope="col">DISKON</th>
                            <th scope="col">STOK</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <?php
                  include 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM `promo`");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $data['nama'];?>
                        </td>
                        <td align="center">
                            <img src="image/<?php echo $data['gambar']; ?>" width="50" alt="">
                        </td>

                        <td align="center">
                            <?php echo $data['diskon'];?> <?php echo "%"?>
                        </td>

                        <td align="center">
                            <?php echo $data['stok'];?>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                                data-bs-target="#modalDetail<?php echo $data['promoID'];?>"><img
                                    src="assets/search-unscreen.gif" alt="" width="30">
                                Detail
                            </button>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?php echo $data['promoID'];?>"><img
                                    src="assets/edit-unscreen.gif" alt="" width="30">
                                Edit
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete<?php echo $data['promoID'];?>"><img
                                    src="assets/trash-can-unscreen.gif" alt="" width="30">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Detail Modal -->
                    <div class="modal fade" id="modalDetail<?php echo $data['promoID'];?>" tabindex="-1"
                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalDelete">Detail <img
                                            src="assets/search-unscreen.gif" alt="" width="30"></h3>
                                </div>
                                <div class="modal-body" id="modal-detail">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nama Promo</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['nama'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Kode Promo
                                        </span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['kode'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Diskon
                                        </span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['diskon'];?><?php echo "%"?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Deskripsi</span>
                                        <textarea class="form-control" aria-label="With textarea"
                                            readonly> <?php echo $data['deskripsi'];?></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Stok</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['stok'];?>" readonly>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail Modal -->
                    <!-- Update Modal -->
                    <div class="modal fade" id="modalEdit<?php echo $data['promoID'];?>" tabindex="-1"
                        aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalEditLabel">Edit Data Promo</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="update_promo.php" method="post" role="form">
                                        <?php
                                            $promoID = $data['promoID'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM promo WHERE promoID='$promoID'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-8"> <input type="hidden" name="promoID"
                                                        value="<?php echo $data['promoID']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Nama Promo</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                        name="nama" value="<?php echo $data1['nama']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Gambar </label>
                                                <div class="col-sm-8"><input type="file" class="form-control"
                                                        name="gambar" value="product/<?php echo $data1['gambar']; ?>">
                                                    <input type="hidden" name="gambar"
                                                        value="<?php echo  $data1['gambar']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Kode </label>
                                                <div class="col-sm-8"><input type="text" name="kode"
                                                        class="form-control" value="<?php echo $data1['kode']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Deskripsi </label>
                                                <div class="col-sm-8"><textarea class="form-control" name="deskripsi"
                                                        placeholder="Masukkan Deskripsi Promo" value=""
                                                        required><?php echo $data1['deskripsi']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Stok </label>
                                                <div class="col-sm-8"><input type="number" name="stok"
                                                        class="form-control" value="<?php echo $data1['stok']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Diskon </label>
                                                <div class="col-sm-8"><input type="number" name="diskon"
                                                        class="form-control" value="<?php echo $data1['diskon']; ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                </div>
                                <?php
}
?>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="modal fade" id="modalDelete<?php echo $data['promoID'];?>" tabindex="-1"
            aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalDelete">Konfirmasi Hapus data</h3>
                    </div>
                    <div class="modal-body">
                        <h5 align="center">Apakah anda yakin ingin menghapus Promo Ini
                            <strong><span class="grt"></span></strong> ?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="hapus_promo.php?promoID=<?php echo $data['promoID']; ?>"
                            class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <?php
}
                ?>
        </table>




    </div>
    <!-- Simpan Modal  -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="modalTambahLabel">Tambah Data Baru</h3>
                </div>
                <div class="modal-body">
                    <form action="simpan_data_promo.php" method="POST" role="form">
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Nama Promo</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="nama"
                                        placeholder="Nama Promo" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Gambar</label>
                                <div class="col-sm-8"><input type="file" class="form-control" name="gambar"
                                        placeholder="Masukkan Gambar" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Kode</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="kode"
                                        placeholder="Masukkan Kode Promo" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Deskripsi</label>
                                <div class="col-sm-8"><textarea class="form-control" name="deskripsi"
                                        placeholder="Masukkan Deskripsi Promo" value="" required></textarea></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Stok</label>
                                <div class="col-sm-8"><input type="number" class="form-control" name="stok"
                                        placeholder="Masukkan Jumlah Stok" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Diskon </label>
                                <div class="col-sm-8"><input type="number" name="diskon" class="form-control"
                                        id="text-detail" placeholder="Diskon" required>
                                    </input>
                                </div>
                            </div>
                        </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>

</body>

</html>