<?php
session_start();

if (!isset($_SESSION["id"])) {
    $_SESSION["id"] = 1;
}

if(isset($_POST["tambah_kamar"])){
    $id = $_SESSION["id"];
    $namaKamar = $_POST["nama_kamar"];
    $deskripsi = $_POST["deskripsi"];
    $tipe = $_POST["tipe_kamar"];
    $harga = $_POST["harga"];
    
    if(empty($namaKamar)){
        $_SESSION["error"] = "Nama Kamar harus diisi!";

        header("Location: ./tambahKamar.php");
        exit;
    }elseif (empty($deskripsi)) {
        $_SESSION["error"] = "Deskripsi Kamar harus diisi!";

        header("Location: ./tambahKamar.php");
        exit;
    }elseif (empty($tipe)) {
        $_SESSION["error"] = "Tipe Kamar harus diisi!";

        header("Location: ./tambahKamar.php");
        exit;
    }elseif (empty($harga)) {
        $_SESSION["error"] = "Harga Kamar harus diisi!";

        header("Location: ./tambahKamar.php");
        exit;
    }

    
    $_SESSION["kamar"][] = array(
        "nama_kamar" => $namaKamar,
        "deskripsi" => $deskripsi,
        "tipe_kamar" => $tipe,
        "harga" => $harga
    );

    $_SESSION["id"]++;
    header("Location: ./dashboard.php");
}

?>