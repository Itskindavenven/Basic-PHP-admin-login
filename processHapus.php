<?php
session_start();

if(isset($_GET["id"])) { // Anda bisa menggunakan $_POST jika Anda mengirim data dengan metode POST
    $idKamar = $_GET["id"]; // Gantilah ini dengan cara Anda mengidentifikasi kamar yang ingin dihapus (misalnya, ID atau indeks)

    // Periksa apakah kamar dengan ID yang diberikan ada dalam session
    if(isset($_SESSION["kamar"][$idKamar])) {
        // Hapus kamar dari array $_SESSION["kamar"]
        unset($_SESSION["kamar"][$idKamar]);

        // Redirect kembali ke halaman tampilkanKamar.php setelah menghapus
        header("Location: dashboard.php");
        exit();
    }
}

// Jika ID tidak valid atau tidak ditemukan, Anda bisa mengarahkan ke halaman lain atau menampilkan pesan kesalahan
header("Location: halamanError.php"); // Gantilah ini sesuai kebutuhan
?>
