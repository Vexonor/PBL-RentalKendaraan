<?php

function calculateTimeRemaining($targetTimestamp)
{
    $currentTimestamp = time();
    $remainingTime = $targetTimestamp - $currentTimestamp;
    return $remainingTime;
}

function formatRemainingTime($remainingTime)
{
    $days = floor($remainingTime / (60 * 60 * 24));
    $hours = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($remainingTime % (60 * 60)) / 60);
    $seconds = $remainingTime % 60;

    return $days . "h " . $hours . "j " . $minutes . "m " . $seconds . "d";
}

session_start();

if (!isset($_SESSION["nama"]) || !isset($_SESSION["role"]) || $_SESSION["role"] == "Buyer") {
    header("location:login-daftar.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$nama = $_SESSION["nama"];
$no_hp = $_SESSION["no_hp"]  ;
$nik = $_SESSION["nik"] ;
$email = $_SESSION["email"] ;

include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE email = '$email'");
$data = mysqli_fetch_assoc($query);


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
                        <a class="nav-link active text-white text-center bg-primary" href="admin_konfirmasi.php"
                            style="border-radius:70px 40px; height: 45px; padding-top: 10px;">
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
                <h3><img src="assets/presentation-unscreen.gif" alt="" width="50">Daftar
                    Konfirmasi</h3>
                <hr>

                <table class="table table-striped table-bordered mb-5">
                    <thead align="center">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">USER ID.</th>
                            <th scope="col">KENDARAAN</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">WAKTU</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <?php 
                    error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
                include "koneksi.php";
                            $sql = "SELECT * FROM konfirmasi WHERE persetujuan='Belum Disetujui' OR persetujuan='Disetujui' ";
                            $no = 1;
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
                    <tr>
                        <td colspan="100%">Tidak ada data yang ditemukan !</td>
                    </tr>
                    <?php
                    endif;
                    while ($value = mysqli_fetch_assoc($query)) :
                        date_default_timezone_set('Asia/Jakarta');
                        
                        $targetTimestamp = strtotime("+" . htmlspecialchars($value['hari']) . " days", strtotime($value['waktu']));
                        $remainingTime = calculateTimeRemaining($targetTimestamp);

                        if ($remainingTime <= 0) {
                            $remainingTimeFormatted = "Waktu Habis";
                        } else {
                            $remainingTimeFormatted = formatRemainingTime($remainingTime);
                        }
                    ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['user_id'] ) ?>
                        </td>
                        <td>
                            <img src="product/<?= htmlspecialchars( $value['gambar_product'] ) ?>" width="50" alt="">
                        </td>
                        <td>
                            <?= htmlspecialchars( $value['nama'] ) ?>
                        </td>

                        <td>
                            <div id="countdown<?= htmlspecialchars($value['confirm_id']) ?>" class="countdown">
                                <?php 
                                if(isset($value['aksi']) && $value['aksi'] == 'Start' ){
                                    echo $remainingTimeFormatted;
                                }
                                ?>
                            </div>
                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-outline-primary " data-bs-toggle="modal"
                                data-bs-target="#modalDetail<?= htmlspecialchars( $value['confirm_id'] ) ?>"><img
                                    src="assets/search-unscreen.gif" alt="" width="30">
                                Detail
                            </button>
                            <?php
if (isset($value['persetujuan']) && $value['persetujuan'] == 'Belum Disetujui') {
    echo "
    <button type='button' class='btn btn-outline-success' data-bs-toggle='modal'
    data-bs-target='#modalEdit" . htmlspecialchars($value['confirm_id']) . "'> <img
    src='assets/thumbs-up-unscreen.gif' alt='' width='30'>
    Setuju
    </button>
    <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal'
        data-bs-target='#modalTolak" . htmlspecialchars($value['confirm_id']) . "'><img
            src='assets/thumbs-down-unscreen.gif' alt='' width='30'>
        Tolak
    </button>
    ";
} elseif (isset($value['aksi']) && $value['aksi'] == 'Stop') {
    echo "
    <form action='aksi.php' method='post' id='countdownForm" . htmlspecialchars($value['confirm_id']) . "' class='mt-3'>
    <div class='form-group'>
        <input type='hidden' name='rentalDuration' class='form-control' min='1'
            value='" . htmlspecialchars($value['hari']) . "' required>
        <input type='hidden' name='confirm_id' value='" . trim($value['confirm_id']) . "'>
        <input type='hidden' name='aksi' value='" . trim($value['aksi']) . "'>
        <button type='submit' name='submit' class='btn btn-outline-primary start-countdown-btn'
            id='countdown" . htmlspecialchars($value['confirm_id']) . "' onclick='startCountdown" . htmlspecialchars($value['confirm_id']) . "()'>
            <img src='assets/pocket-watch-unscreen.gif' alt='' width='30'>
            Start Countdown
        </button>
    </div>
</form>";
} 
?>

                            <script>
                            var stoppedTimers = {};

                            function startCountdown<?= $value['confirm_id'] ?>(event) {
                                event.preventDefault();

                                var confirmation = confirm('Apakah Anda yakin ingin memulai countdown?');
                                if (confirmation) {
                                    var rentalDuration = <?= $value['hari'] ?>;

                                    var targetTimestamp = Math.floor(Date.now() / 1000) + (24 * 60 * 60);

                                    var stopped = false;
                                    var countdownElement = document.getElementById(
                                        'countdown<?= $value['confirm_id'] ?>');

                                    stopTimer('<?= $value['confirm_id'] ?>');

                                    var intervalId = setInterval(function() {
                                        updateCountdown(countdownElement, targetTimestamp,
                                            '<?= $value['confirm_id'] ?>');
                                    }, 1000);

                                    stoppedTimers['<?= $value['confirm_id'] ?>'] = intervalId;

                                    setInterval(function() {
                                        updateCountdownAJAX('<?= $value['confirm_id'] ?>', targetTimestamp);
                                    }, 5000);

                                    updateCountdown(countdownElement, targetTimestamp, '<?= $value['confirm_id'] ?>');
                                }
                            }

                            function stopTimer<?= $value['confirm_id'] ?>(timerId) {
                                if (stoppedTimers[timerId]) {
                                    clearInterval(stoppedTimers[timerId]);
                                }

                                localStorage.removeItem('countdownInfo' + timerId);
                            }

                            setInterval(function() {
                                var countdownElements = document.querySelectorAll('[id^=countdown]');

                                countdownElements.forEach(function(element) {
                                    var timerId = element.id.replace('countdown', '');
                                    var countdownInfo = localStorage.getItem('countdownInfo' + timerId);

                                    if (countdownInfo) {
                                        countdownInfo = JSON.parse(countdownInfo);
                                        updateCountdown(element, countdownInfo.targetTimestamp,
                                            timerId);
                                    }
                                });
                            }, 1000);

                            function updateCountdownAJAX(timerId, targetTimestamp) {
                                var xhr = new XMLHttpRequest();
                                var randomParam = new Date().getTime();
                                xhr.open('GET', 'update_countdown.php?confirm_id=' + timerId + '&target_timestamp=' +
                                    targetTimestamp + '&rand=' + randomParam, true);
                                xhr.setRequestHeader('Cache-Control', 'no-cache');
                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        var countdownElement = document.getElementById('countdown' + timerId);
                                        countdownElement.innerHTML = xhr.responseText;
                                    }
                                };
                                xhr.send();
                            }

                            function updateCountdown(element, targetTimestamp, timerId) {
                                var now = Math.floor(Date.now() / 1000);
                                var remainingTime = targetTimestamp - now;

                                if (remainingTime <= 0) {
                                    stopTimer(timerId);
                                    element.innerHTML = "Time's Up";
                                } else {
                                    element.innerHTML = formatRemainingTime(remainingTime);
                                }
                            }
                            </script>
                        </td>
                    </tr>
                    <!-- Detail Modal -->
                    <div class="modal fade" id="modalDetail<?= htmlspecialchars( $value['confirm_id'] ) ?>"
                        tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalDelete">Detail <img
                                            src="assets/search-unscreen.gif" alt="" width="30"></h3>
                                </div>
                                <div class="modal-body" id="modal-detail">
                                    <div class="container-xxl">
                                        <div class="row g-0 text-center">
                                            <div class="col-sm-6 col-md-4 my-auto">
                                                <span class="fs-5">SIM Penyewa</span> <br>
                                                <img src="<?= htmlspecialchars($value['sim']) ?>" alt="" width="250">
                                            </div>
                                            <div class="col-6 col-md-8">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Nama
                                                        Kendaraan</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?= htmlspecialchars( $value['nama_product'] ) ?>"
                                                        readonly>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Nama
                                                        Penyewa</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?= htmlspecialchars( $value['nama'] ) ?>" readonly>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Alamat
                                                        Penyewa</span>
                                                    <textarea class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        readonly><?= htmlspecialchars( $value['alamat'] ) ?></textarea>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Jumlah
                                                        Hari</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?= htmlspecialchars( $value['hari'] ) ?>" readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">No.
                                                        Handphone
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value=" <?= htmlspecialchars( $value['no_hp'] ) ?>" readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">NIK
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value=" <?= htmlspecialchars( $value['nik'] ) ?>" readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Harga
                                                        Rental
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?php echo "Rp."?> <?= htmlspecialchars( $value['harga'] ) ?>"
                                                        readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Promo
                                                        ID
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?= htmlspecialchars( $value['promo_id'] ) ?>" readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Total
                                                        Harga Rental
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value="<?php echo "Rp."?> <?= htmlspecialchars( $value['total_harga'] ) ?>"
                                                        readonly>
                                                </div>
                                                <div class=" input-group mb-3">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Status
                                                        Persetujuan
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default"
                                                        value=" <?= htmlspecialchars( $value['persetujuan'] ) ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
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
                    <!-- Agree Modal -->
                    <div class="modal fade" id="modalEdit<?= htmlspecialchars( $value['confirm_id'] ) ?>" tabindex="-1"
                        aria-labelledby="modalEditLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fs-5" id="modalEditLabel">Setuju</h3>
                                </div>
                                <div class="modal-body">
                                    <form action="update_confirm.php" method="post" role="form">
                                        <?php
                                            $confirm_id = $value['confirm_id'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE confirm_id='$confirm_id'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                                        <h5 align="center">Apakah anda yakin ingin menyetujui permintaan Ini
                                            <strong><span class="grt"></span></strong> ?
                                        </h5>
                                        <input type="hidden" name="confirm_id"
                                            value="<?php echo $data1['confirm_id'] ?>">
                                        <input type="hidden" name="persetujuan"
                                            value="<?php echo $data1['persetujuan'] ?>">

                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="YA">
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
        <!-- Agree Delete -->
        <!-- Disagree Delete -->
        <div class="modal fade" id="modalTolak<?= htmlspecialchars( $value['confirm_id'] ) ?>" tabindex="-1"
            aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalEditLabel">Tolak</h3>
                    </div>
                    <div class="modal-body">
                        <form action="tolak_confirm.php" method="post" role="form">
                            <?php
                                            $confirm_id = $value['confirm_id'];
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM konfirmasi WHERE confirm_id='$confirm_id'");
                                            while ($data1 = mysqli_fetch_assoc($query1)) {
                                            ?>
                            <h5 align="center">Apakah anda yakin ingin menolak permintaan Ini
                                <strong><span class="grt"></span></strong> ?
                            </h5>
                            <input type="hidden" name="productID" value="<?php echo $data1['productID'] ?>">
                            <input type="hidden" name="confirm_id" value="<?php echo $data1['confirm_id'] ?>">
                            <input type="hidden" name="persetujuan" value="<?php echo $data1['persetujuan'] ?>">

                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" class="btn btn-danger" value="TOLAK">
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
    <!-- Disagree Delete -->
    <?php endwhile; ?>
    </table>
    <br><br>

    <h3><img src="assets/stop-unscreen.gif" alt="" width="50">Daftar
        Penolakan</h3>
    <hr>

    <table class="table table-striped table-bordered">
        <thead align="center">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">USER ID.</th>
                <th scope="col">KENDARAAN</th>
                <th scope="col">USERNAME</th>
                <th scope="col">STATUS</th>
            </tr>
        </thead>
        <?php 
                    error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
                include "koneksi.php";
                            $sql = "SELECT * FROM konfirmasi WHERE persetujuan='Tolak' ";
                            $no = 1;
                            $query = mysqli_query($koneksi, $sql);
                            if (mysqli_num_rows($query) < 1) : ?>
        <tr>
            <td colspan="100%">Tidak ada data yang ditemukan !</td>
        </tr>
        <?php
                    endif;
                    while ($value = mysqli_fetch_assoc($query)) :
                    ?>
        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td>
                <?= htmlspecialchars( $value['user_id'] ) ?>
            </td>
            <td>
                <img src="product/<?= htmlspecialchars( $value['gambar_product'] ) ?>" width="50" alt="">
            </td>
            <td>
                <?= htmlspecialchars( $value['nama'] ) ?>
            </td>

            <td>
                <?= htmlspecialchars( $value['persetujuan'] ) ?>
            </td>
            <?php endwhile; ?>
    </table>



    </div>

    </div>
    </div>

    </div>

</body>

</html>