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
                        <a class="nav-link active text-white text-center bg-primary" href="admin_user.php"
                            style="border-radius:70px 40px; height: 45px; padding-top: 10px;"><i
                                class="fas fa-users mr-2"></i>Daftar
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
                <h3><img src="assets/user-unscreen.gif" alt="" width="50">Daftar
                    User</h3>
                <hr>
                <table class="table table-bordered table-striped">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <?php
                  include 'koneksi.php';
                  $query = mysqli_query($koneksi, "SELECT * FROM `user`");
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($query)) {
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama'];?>
                            </td>
                            <td>
                                <?php echo $data['email'];?>
                            </td>
                            <td align="center" class="btn-action">
                                <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                                    data-bs-target="#modalDetail<?php echo $data['user_id'];?>"><img
                                        src="assets/search-unscreen.gif" alt="" width="30">
                                    Detail
                                </button>
                                <button type="button" class="btn btn-outline-success " data-bs-toggle="modal"
                                    data-bs-target="#modalEdit<?php echo $data['user_id'];?>"> <img
                                        src="assets/edit-unscreen.gif" alt="" width="30">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete<?php echo $data['user_id'];?>"> <img
                                        src="assets/trash-can-unscreen.gif" alt="" width="30">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    </tbody>
                    <!-- Detail Modal -->
                    <div class="modal fade" id="modalDetail<?php echo $data['user_id'];?>" tabindex="-1"
                        aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalDelete">Detail <img
                                            src="assets/search-unscreen.gif" alt="" width="30"></h3>
                                </div>
                                <div class="modal-body" id="modal-detail">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['nama'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">No.
                                            Handphone</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['no_hp'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal
                                            Lahir</span>
                                        <input type="date" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['tanggal'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">NIK</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['nik'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Role</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['role'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['email'];?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                                        <input type="password" class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-default"
                                            value="<?php echo $data['password'];?>" readonly>
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
                    <div class="modal fade" id="modalEdit<?php echo $data['user_id'];?>" tabindex="-1"
                        aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalEditLabel">Edit Data User <img
                                            src="assets/edit-unscreen.gif" alt="" width="30"></h3>
                                </div>
                                <div class="modal-body" id="modal-update">
                                    <form action="update_user_admin.php" method="post" role="form">
                                        <?php
                                            $user_id = $data['user_id'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-8"> <input type="hidden" name="user_id"
                                                        value="<?php echo $data['user_id']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row ">
                                                <label class="col-sm-3 control-label text-right">Username
                                                </label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                        name="nama" value="<?php echo $data1['nama']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row ">
                                                <label class="col-sm-3 control-label text-right">No. HP </label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                        name="no_hp" value="<?php echo $data1['no_hp']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row ">
                                                <label class="col-sm-3 control-label text-right">Tanggal Lahir
                                                </label>
                                                <div class="col-sm-8"><input type="date" class="form-control"
                                                        name="tanggal" value="<?php echo $data1['tanggal']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row ">
                                                <label class="col-sm-3 control-label text-right">NIK </label>
                                                <div class="col-sm-8"><input type="text" class="form-control" name="nik"
                                                        value="<?php echo $data1['nik']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Email</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                        name="email" value="<?php echo $data1['email']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Password
                                                </label>
                                                <div class="col-sm-8"><input type="text" name="password"
                                                        class="form-control" value="<?php echo $data1['password']; ?>"
                                                        readonly>
                                                    </input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Role </label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="role">
                                                        <option selected><?php echo $data1['role']; ?></option>
                                                        <option value="Buyer">Buyer</option>
                                                        <option value="Seller">Seller</option>
                                                    </select>
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
        <div class="modal fade" id="modalDelete<?php echo $data['user_id'];?>" tabindex="-1"
            aria-labelledby="modalDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalDelete">Konfirmasi Hapus data <img
                                src="assets/trash-can-unscreen.gif" alt="" width="30"></h3>
                    </div>
                    <div class="modal-body">
                        <h5 align="center">Apakah anda yakin ingin menghapus User Ini
                            <strong><span class="grt"></span></strong> ?
                        </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="hapus_user.php?id=<?php echo $data['user_id']; ?>" class="btn btn-primary">Delete</a>
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
    </div>

</body>

</html>