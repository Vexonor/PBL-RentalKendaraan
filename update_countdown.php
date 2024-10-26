<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['confirm_id']) && isset($_GET['target_timestamp'])) {
        $timerId = $_GET['confirm_id'];
        $targetTimestamp = $_GET['target_timestamp'];

        // Hitung sisa waktu
        $now = time();
        $remainingTime = $targetTimestamp - $now;

        // Format waktu tersisa
        $formattedTime = formatRemainingTime($remainingTime);

        // Kirim waktu tersisa sebagai respon
        echo $formattedTime;
        exit();
    }
}

function formatRemainingTime($remainingTime) {
    // Implementasikan logika sesuai kebutuhan
    // Contoh sederhana: menit dan detik
    $minutes = floor($remainingTime / 60);
    $seconds = $remainingTime % 60;
    return $minutes . ' menit ' . $seconds . ' detik';
}

?>