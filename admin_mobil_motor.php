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
                        <a class="nav-link active text-white text-center bg-primary" href="admin_kendaraan.php"
                            style="border-radius:70px 40px; height: 45px; padding-top: 10px;"><i
                                class="fas fa-car ml-2"></i>
                            Kendaraan</a>
                        <a href="admin_mobil.php">
                            <button class="btn btn-primary" type="button">
                                Tambah Kendaraan
                            </button>
                        </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_konfirmasi.php">
                            <i class="fas fa-clipboard-list ml-2"></i>Konfirmasi
                        </a>
                        <hr class="bg-secondary">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin_promo.php"><i class="fas fa-tags mr-2"></i>Daftar
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
                <h3> <img src="assets/plus-unscreen.gif" alt="" width="25">Tambah Data Kendaraan</h3>
                <hr>
                <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal"
                    data-bs-target="#modalTambah">
                    <img src="assets/plus-unscreen.gif" alt="" width="25">TAMBAH
                </button>
                <table class="table table-striped table-bordered">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">GAMBAR KENDARAAN</th>
                            <th scope="col">NAMA KENDARAAN</th>
                            <th scope="col">STOK</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <?php 
                include "koneksi.php";
                            $sql = "SELECT * FROM kendaraan ORDER BY productID DESC";
                            $no = 1;
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
                    <tr>
                        <td colspan="100%">Tidak ada data yang ditemukan !</td>
                    </tr>
                    <?php
                            endif;
                            foreach ($query as $key => $value) :
                            ?>
                    <tr>
                        <td align="center">
                            <?php echo $no++; ?>
                        </td>
                        <td align="center">
                            <img src="product/<?= htmlspecialchars( $value['gambar'] ) ?>" width="50" alt="">
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['namaProduct'] ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars( $value['stok'] ) ?>
                        </td>

                        <td align="center">
                            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                                data-bs-target="#modalDetail<?= htmlspecialchars( $value['productID'] ) ?>"><img
                                    src="assets/search-unscreen.gif" alt="" width="30">
                                Detail
                            </button>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                data-bs-target="#modalEdit<?= htmlspecialchars( $value['productID'] ) ?>"> <img
                                    src="assets/edit-unscreen.gif" alt="" width="30">
                                Edit
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDelete<?= htmlspecialchars( $value['productID'] ) ?>"><img
                                    src="assets/trash-can-unscreen.gif" alt="" width="30">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Detail Modal -->
                    <div class="modal fade" id="modalDetail<?= htmlspecialchars( $value['productID'] ) ?>" tabindex="-1"
                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalDelete">Detail <img
                                            src="assets/search-unscreen.gif" alt="" width="30"></h3>
                                </div>
                                <div class="modal-body" id="modal-detail">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nama
                                            Kendaraan</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?= htmlspecialchars( $value['namaProduct'] ) ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Harga</span>

                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value=" <?php echo "Rp. "?><?= htmlspecialchars( $value['harga'] ) ?>"
                                            readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Stok
                                        </span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?= htmlspecialchars( $value['stok'] ) ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Detail</span>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2" style="height: 100px"
                                                readonly><?= htmlspecialchars( $value['detail'] ) ?></textarea>
                                        </div>
                                    </div>
                                    <div class=" input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Jenis
                                            Kendaraan</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value=" <?= htmlspecialchars( $value['jenis'] ) ?>" readonly>
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
                    <div class="modal fade" id="modalEdit<?= htmlspecialchars( $value['productID'] ) ?>" tabindex="-1"
                        aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalEditLabel">Edit Data Product</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="update_kendaraan.php" method="post" role="form">
                                        <?php
                                            $productID = $value['productID'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE productID='$productID'");
                                            foreach ($query1 as $key => $edit) :
                                            ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-8"> <input type="hidden" name="productID"
                                                        value="<?= htmlspecialchars( $edit['productID'] ) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Gambar </label>
                                                <div class="col-sm-8"><input type="file" class="form-control"
                                                        name="gambar"
                                                        value="product/<?= htmlspecialchars( $edit['gambar'] ) ?>">
                                                    <input type="hidden" name="gambarProduct"
                                                        value="<?= htmlspecialchars( $edit['gambar'] ) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Nama Kendaraan</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                        name="namaProduct"
                                                        value="<?= htmlspecialchars( $edit['namaProduct'] ) ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Harga </label>
                                                <div class="col-sm-8"><input type="text" name="harga"
                                                        class="form-control"
                                                        value="<?= htmlspecialchars( $edit['harga'] ) ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Stok </label>
                                                <div class="col-sm-8"><input type="number" name="stok"
                                                        class="form-control"
                                                        value="<?= htmlspecialchars( $edit['stok'] ) ?>">
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Detail </label>
                                                <div class="col-sm-8">
                                                    <div class="form-floating">
                                                        <textarea name="detail" class="form-control"
                                                            placeholder="Leave a comment here" id="floatingTextarea2"
                                                            style="height: 100px"
                                                            required><?= htmlspecialchars( $value['detail'] ) ?></textarea>
                                                    </div>
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
        endforeach;
        ?>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <div class="modal fade" id="modalDelete<?= htmlspecialchars( $value['productID'] ) ?>" tabindex="-1"
            aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalDelete">Konfirmasi Hapus data</h3>
                    </div>
                    <div class="modal-body">
                        <h5 align="center">Apakah anda yakin ingin menghapus Kendaraan Ini
                            <strong><span class="grt"></span></strong> ?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="hapus_kendaraan.php?productID=<?= htmlspecialchars( $value['productID'] ) ?>"
                            class="btn btn-primary">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete -->
        <?php
        endforeach;
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
                    <form action="simpan_data_kendaraan.php" method="POST" role="form">
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Gambar</label>
                                <div class="col-sm-8"><input type="file" class="form-control" name="gambar"
                                        placeholder="Username" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Nama Kendaraan</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="namaProduct"
                                        placeholder="Nama Kendaraan" value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Jenis Kendaraan</label>
                                <div class="col-sm-8">
                                    <select class="form-select" aria-label="Default select example" name="jenis">
                                        <option selected>Pilih Jenis Kendaraan</option>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Harga</label>
                                <div class="col-sm-8"><input type="text" class="form-control" name="harga"
                                        placeholder="Rp." value="" required></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right">Stok</label>
                                <div class="col-sm-8"><input type="number" class="form-control" name="stok" value=""
                                        required></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-left">Detail </label>
                                <div class="col-sm-8">
                                    <div class="form-floating">
                                        <textarea name="detail" class="form-control" placeholder="Leave a comment here"
                                            id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
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