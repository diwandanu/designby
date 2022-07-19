<?php
session_start();

$username = $_SESSION['username'];
$email  = $_SESSION['email'];
$ovo = $_SESSION['ovo'];

require 'function.php';
$stocks = query("SELECT * FROM stocks");

// ambil data di URL
$id = $_GET["id"];

// query data stocks berdasarkan id
$stocks = query("SELECT * FROM stocks WHERE id=$id")[0];

if ($_SESSION['level'] !== "user") {
    header("location: logout.php");
} else {
}

?>


<!doctype html>
<html lang="en" oncontextmenu="return false">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/listshadow.css">

    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <title>Detail Produk</title>
</head>

<body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

<!-- Navigation Bar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="MainNav">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php" style="font-family: 'Dancing Script', cursive;">
                <img src="images/logo.png" alt="" width="40" height="30" class="d-inline-block align-text-top">
                DesignBy
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link js-scroll-trigger" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="about2.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="order.php">Pesanan Anda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" href=""> <?= $email ?> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="changepassword.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-exclamation" viewBox="0 0 16 16">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                        <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z" />
                                    </svg>
                                    Ganti Password
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<br>

<div class="container" style="min-width: 350px;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/<?= $stocks["preview"] ?>" class="d-block w-100 h-100"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/<?= $stocks["image"] ?>" class="d-block w-100 h-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>
    <ul>
        <h4>
            <?= $stocks["title"] ?>
        </h4>
        <br>
        <p>
            <?= nl2br($stocks["description"], false) ?>
        </p>
        <br><br><br>

    </ul>



    <!-- Button trigger modal -->
    <!-- Trigger the modal with a button -->
    <ul>
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 2 16 16">
            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
        </svg>
             | RP <?= number_format($stocks["price"])  ?>
            </button>
    </ul>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content">



                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Pesanan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Desain</label>

                            <div class="card mb-3">
                                <img src="images/<?= $stocks["preview"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $stocks["title"] ?> </h5>
                                    <p class="card-text"><?= $stocks["description"] ?> </p>
                                    <br>
                                    <label for="price">Harga</label>
                                    <p>RP <?= number_format($stocks["price"]) ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="" value="<?= $username ?>" required autocomplete="off" disabled>
                        </div>
                        <div class=" form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $email ?>" required autocomplete="off" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ovo">Nomor OVO</label>
                            <input type="text" name="ovo" id="ovo" class="form-control" placeholder="" value="<?= $ovo ?>" required autocomplete="off" disabled>
                            <input type="hidden" name="id" id="id" class="form-control" value="<?= $stocks["id"] ?>">
                            <input type="hidden" name="image" id="image" class="form-control" value="<?= $stocks["preview"] ?>">
                            <input type="hidden" name="product" id="product" class="form-control" value="<?= $stocks["title"] ?>">
                            <input type="hidden" name="cost_price" id="cost_price" class="form-control" value="<?= $stocks["price"] ?>">
                        </div>

                </div>
                <div class="modal-footer">

                    <?php
                    if (isset($_POST["order"])) {
                        if (order($_POST) > 0) {
                            $_SESSION['pesanan'] = "pesan";
                            echo "<script>
                          alert('Order Berhasil!');
                          document.location.href='order.php';
                          </script>";
                        } else {
                            echo mysqli_error($conn);
                        }
                    }
                    ?>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="order" class="btn btn-primary">Pesan</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<br><br>
<footer class="py-5">
    <div class="medium text-center text-muted">Copyright &copy; 2021 - DesignBy</div>
</footer>


</html>