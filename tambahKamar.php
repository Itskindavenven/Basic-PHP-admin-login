<?php
session_start();

$detail = [
    "name" => "Grand Atma",
    "tagline" => "Hotel & Resort",
    "page_title" => "Log in - Grand Atma Hotel & Resort",
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <link rel="stylesheet" href="./assets/css/style.css">

        <style>
            #formAuth{
                /* max-width: 576px;
                margin: 0 auto; */
                text-align: left;
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
                    <li class="nav-item"><a href="./dashboard.php" class="nav-link">Admin Panel</a></li>
                    <li class="nav-item"><a href="./processLogout.php" class="nav-link text-danger">Logout</a></li>
                </ul>
            </nav>
        </header>

        <main style="padding-top: 84px;" class="container">
            <h1 class="mt-5 mb-3 border-bottom fw-bold">Tambah Kamar</h1>
            <form action="./processTambah.php" method="POST" id="formAuth" enctype="multipart/form-data">
            <?php if(isset($_SESSION["error"])) { ?>
                <div class="alert alert-danger mb-4 text-center" role="alert">
                    <strong>Error!</strong> <?php echo $_SESSION["error"]; ?>
                </div>
            <?php
                unset($_SESSION["error"]);
            }?>
                <div class="row mb-3">
                    <label for="inputNamaKamar" class="col-sm-2 col-form-label">Nama Kamar</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNamaKamar" name="nama_kamar" value="<?php echo isset($_POST['nama_kamar']) ? $_POST['nama_kamar'] : ''; ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="floatingTextareaDisabled" style="height: 147px;" name="deskripsi" required><?php echo isset($_POST['deskripsi']) ? $_POST['deskripsi'] : ''; ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputTipe" class="col-sm-2 col-form-label">Tipe Kamar</label>
                    <div class="col-sm-10"> 
                        <select id="inputTipe" class="form-select" name="tipe_kamar" required>
                            <option value="">Pilih Tipe Kamar</option>
                            <option value="Standard" <?php if(isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Standard') echo 'selected'; ?>>Standard</option>
                            <option value="Superior" <?php if(isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Superior') echo 'selected'; ?>>Superior</option>
                            <option value="Luxury" <?php if(isset($_POST['tipe_kamar']) && $_POST['tipe_kamar'] == 'Luxury') echo 'selected'; ?>>Luxury</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" id="minusBtn">-</button>
                            </div>
                            <input type="text" class="form-control text-center" id="quantityInput" name="harga" value="<?php echo isset($_POST['harga']) ? $_POST['harga'] : ''; ?>" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="plusBtn">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-floppy-disk"></i> Simpan</button>
                        <input type="hidden" name="tambah_kamar" value="1">
                    </div>
                </div>
            </form>
        </main>
    
    <script>
        document.getElementById("plusBtn").addEventListener("click", function() {
            var input = document.getElementById("quantityInput");
            var value = parseInt(input.value);
            input.value = (isNaN(value) ? 0 : value) + 1;
        });

        document.getElementById("minusBtn").addEventListener("click", function() {
            var input = document.getElementById("quantityInput");
            var value = parseInt(input.value);
            input.value = Math.max((isNaN(value) ? 0 : value) - 1, 0);
        });
    </script>

    </body>
</html>