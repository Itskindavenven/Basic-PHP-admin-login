<?php
    session_start();

    $detail = [
        "name" => "Grand Atma",
        "tagline" => "Hotel & Resort",
        "page_title" => "Grand Atma Hotel & Resort",
        "logo" => "./assets/images/crown.png"
    ];

    $gambar = [
        "./assets/images/hotel1.jpg",
        "./assets/images/hotel2.jpg",
        "./assets/images/hotel3.jpg"
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

        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body>
        <header class="fixed-top" id="navbar">
            <nav class="container nav-top py-2">
                <a href="./" class="rounded bg-white py-2 px-3 d-flex align-items-center nav-home-btn">
                    <img src="<?php echo $detail["logo"];?>" class="crown-logo">
                    <div>
                        <p class="mb-0 fs-5 fw-bold"><?php echo $detail["name"];?></p>
                        <p class="small mb-0"><?php echo $detail["tagline"];?></p>
                    </div>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="./login.php" class="nav-link text-bg-success">Admin Login</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php foreach ($gambar as $i => $gbr){
                    
                    ?>
                        <button
                            type="button"
                            data-bs-target="#myCarousel"
                            data-bs-slide-to="<?php echo $i; ?>"
                            class="<?php echo $i === 0 ? "active" : ""; ?>"
                            aria-label="Slide <?php echo $i+1; ?>"
                        ></button>
                    <?php } ?>
                </div>
                <div class="carousel-inner">
                    
                        <?php foreach ($gambar as $i => $gbr) {

                        ?>
                            <div class="carousel-item <?php echo $i === 0 ? "active" : ""; ?>">
                                <img 
                                    src="<?php echo $gbr; ?>"
                                    class="carousel-img"
                                    role="img"
                                    aria-label="Gambar ke-<?php echo ($i + 1); ?>"
                                    focusable="false"
                                />
                            </div>
                        <?php } ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="container">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal">
                            Hotel pertama dan satu-satunya <strong>yang fiksional</strong>.
                        </h2>
                        <p class="lead">
                            Diciptakan oleh <strong>Bonaventura Octavito Cahyawan</strong>,
                            mahasiswa Universitas Atma Jaya Yogyakarta dari program studi Informatika.
                        </p>
                        <p class="lead">Nomor Pokok Mahasiswa: <strong>210711233</strong>.</p>
                    </div>
                    <div class="col-md-5">
                        <img 
                            src="./assets/images/featurette-1.webp" 
                            class="featurette-image img-fluid mx-auto rounded shadow"
                            role="img" aria-label="Gambar featurette 1" focusable="false">
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                        <h2 class="featurette-heading fw-normal">
                            Your comfort is key, <strong>experience the heartbeat of our hotel</strong>.
                        </h2>
                        <p class="lead">
                            Our modern, sophisticated guest rooms are designed to excee expectations with premium comfort
                            technology where you need it, and thoughtful attention to detail.
                        </p>
                    </div>
                    <div class="col-md-5 order-md-1">
                        <img 
                        src="./assets/images/featurette-2.jpeg" 
                        class="featurette-image img-fluid mx-auto rounded shadow"
                        role="img" aria-label="Gambar featurette 2" focusable="false">
                    </div>
                </div>
            </div>
            
            <div class="container">
                <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                    <div class="col-md-4 d-flex align-items-center">
                        <span class="mb-3 mb-md-0  text-body-secondary">@2023 <?php echo $detail["name"];?></span>
                    </div>
                </footer>
            </div>
        </main>

        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/home-nav.js"></script>
    </body>

</html>