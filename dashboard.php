<?php
session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ./login.php");
    exit;
}

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel dan Resort",
    "page_title" => "Admin Panel - Grand Atma Hotel & Resort",
    "logo" => "./assets/images/crown.png"
];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $detail["page_title"];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo $detail["logo"]; ?>" type="image/x-icon">

        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="./assets/css/poppins.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <link rel="stylesheet" href="./assets/css/style.css">

        <style>
            .img-bukti-ngantor{
                width: 100%;
                aspect-ratio: 1/1;
                object-fit: cover;
            }
        </style>
    </head>

    <body>
        <header class="fixed-top scrolled" id="navbar">
            <nav class="container nav-top py-2">
                <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                    <img src="<?php echo $detail["logo"]; ?>" class="crown-logo">
                    <div>
                        <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"]; ?></p>
                        <p class="small mb-0"><?php echo $detail["tagline"]; ?></p>
                    </div>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="./" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Admin Panel</a></li>
                    <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main style="padding-top: 84px;" class="container">
            <h1 class="mt-5 mb-3 border-bottom fw-bold" class="container">Dashboard</h1>
            <div class="row">
                <div class="col-lg-10">
                    <div class="card card-body h-100 justify-content-center">
                        <h4>Selamat datang,</h4>
                        <h1 class="fw-bold display-6 mb-3"><?php echo $_SESSION["user"]["username"]; ?></h1>

                        <p class="mb-0">Kamu sudah login sejak:</p>
                        <p class="fw-bold lead mb-0"><?php echo $_SESSION["user"]["login_at"]; ?></p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card card-body">
                        <p>BUkti sedang ngantor:</p>
                        <img 
                            src="<?php echo $_SESSION["user"]["bukti_ngantor"]; ?>" 
                            class="img-fluid rounded img-bukti-ngantor"
                            alt="Bukti ngantor (sudah dihapus)">
                    </div>
                </div>
            </div>
            <h1 class="mt-5 mb-3 border-bottom fw-bold" class="container">Daftar Kamar</h1>
            <p>Grand Atma saat ini meiliki <strong><?php echo count($_SESSION["kamar"]);?></strong> jenis kamar yang eksotis.</p>
            <a href="./tambahKamar.php" class="btn btn-success mb-3"><i class="fa-solid fa-folder-plus"></i> Tambah Kamar</a>

            <br>
            <?php if(isset($_SESSION["kamar"]) && is_array($_SESSION["kamar"])): ?>
                <div class="row" >
                    <?php foreach ($_SESSION["kamar"] as $id => $kamar): ?>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="./assets/images/featurette-2.jpeg" class="img-fluid rounded mx-auto d-block" width="auto" height="auto" alt="Gambar kamar">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold"><?php echo $kamar["nama_kamar"]; ?></h5>
                                            <p class="card-text border-bottom"><?php echo $kamar["deskripsi"]; ?></p>
                                            <p class="card-text">
                                                <span style="margin-right: 10px;">Tipe kamar: <strong><?php echo $kamar["tipe_kamar"]; ?></strong></span>
                                                <span style="margin-right: 10px;">|</span>
                                                <span class="ml-5">Harga: Rp. <?php echo $kamar["harga"]; ?>,00</span>
                                            </p>
                                            <a href="processHapus.php?id=<?php echo $id; ?>" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i>  Hapus Kamar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
            <?php endif; ?>
        </main>
        <script src="./assets/js/bootstrap.min.js"></script>
    </body>
</html>