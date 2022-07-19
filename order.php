<?php
session_start();
$username = $_SESSION['username'];
$email  = $_SESSION['email'];
$id_costumer = $_SESSION['id_costumer'];

require 'function.php';
$pendingorder = query("SELECT * FROM orders WHERE username='$username' AND status='Pending' ");
$paidorder = query("SELECT * FROM orders WHERE username='$username' AND status='Telah Dibayar' ");
$successfulorder = query("SELECT * FROM orders WHERE username='$username' AND status='Berhasil' ");

$resultpending = mysqli_query($conn, "SELECT * FROM orders WHERE username='$username' AND status='Pending' ");
$cekpending = mysqli_num_rows($resultpending);
$resultpaid = mysqli_query($conn, "SELECT * FROM orders WHERE username='$username' AND status='Telah Dibayar' ");
$cekpaid = mysqli_num_rows($resultpaid);
$resultsuccess = mysqli_query($conn, "SELECT * FROM orders WHERE username='$username' AND status='Berhasil' ");
$ceksuccess = mysqli_num_rows($resultsuccess);

$resultpesan = mysqli_query($conn, "SELECT * FROM orders WHERE username='$username' ");
$cekpesan = mysqli_num_rows($resultpesan);

if ($_SESSION['level'] !== "user") {
    header("location: logout.php");
} else {
}

if ($cekpesan > 0) {
    $data = mysqli_fetch_assoc($resultpesan);
} else {
    echo "<script>
            alert('Pesanan Kosong, Harap Pesan Terlebih Dahulu!');
            document.location.href='home.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/listshadow.css">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <title>Halaman Pesanan</title>
</head>

<body>
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
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="about2.php">Tentang Kami</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link js-scroll-trigger" href="order.php">Pesanan Anda<span class="sr-only">(current)</span></a>
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

    <main>
        <div class="container marketing" style="min-width: 1200px;">
            <h1>Pesanan Anda</h1>
            <br>
            <h4>Pesanan Pending</h4>
            <?php
            if ($cekpending > 0) {
                $data = mysqli_fetch_assoc($resultpending);
            ?>

                <?php $i = 1; ?>
                <?php foreach ($pendingorder as $row) : ?>
                    <div class="row featurette" style="margin-top: 2%;">
                        <div class="col-md-7 order-md-2">
                            <div class="row ">
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title" style="margin-top: 2%;">ID Transaksi</h5>
                                    <p class="card-text"><?= $row["transaction_id"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Produk</h5>
                                    <p class="card-text"><?= $row["product"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Harga</h5>
                                    <p class="card-text"><?= number_format($row["cost_price"]) ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text"><?= $row["email"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Nomor OVO</h5>
                                    <p class="card-text"><?= $row["ovo"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Tanggal</h5>
                                    <p class="card-text"><?= tanggal_indonesia(date('N j/n/Y H:i', strtotime($row['date']))); ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Status</h5>
                                    <p class="card-text"><?= $row["status"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <a type="button" class="btn btn-danger" href="cancelorders.php?transaction_id=<?= $row["transaction_id"]; ?>" onclick="return confirm
                                    ('Apakah kamu yakin pesanan ini akan di cancel?');">Batal</a>
                                    <a type="button" class="btn btn-success" href="continueorder.php?transaction_id=<?= $row["transaction_id"]; ?>" style="margin-top: 1px;">Bayar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 order-md-1">
                            <img src="images/<?= $row["image"] ?>" style="max-width : 300px">
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <br>

            <?php
            } else { ?>
                <p style="text-align: center;">--Pesanan Kosong--</p>
                <br>
            <?php } ?>

            <h4 style="margin-top: 1%;">Pesanan Yang Telah Dibayar</h4>
            <?php
            if ($cekpaid > 0) {
                $data = mysqli_fetch_assoc($resultpaid);
            ?>

                <?php $i = 1; ?>
                <?php foreach ($paidorder as $row) : ?>
                    <div class="row featurette" style="margin-top: 2%;">
                        <div class="col-md-7 order-md-2">
                            <div class="row ">
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title" style="margin-top: 2%;">ID Transaksi</h5>
                                    <p class="card-text"><?= $row["transaction_id"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Produk</h5>
                                    <p class="card-text"><?= $row["product"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Harga</h5>
                                    <p class="card-text"><?= number_format($row["cost_price"]) ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text"><?= $row["email"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Nomor OVO</h5>
                                    <p class="card-text"><?= $row["ovo"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Tanggal</h5>
                                    <p class="card-text"><?= tanggal_indonesia(date('N j/n/Y H:i', strtotime($row['date']))); ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Status</h5>
                                    <p class="card-text"><?= $row["status"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5>Pesanan Segera Dikirim Melalui Email</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 order-md-1">
                            <img src="images/<?= $row["image"] ?>" style="max-width : 300px">
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <br>

            <?php
            } else { ?>
                <p style="text-align: center;">--Pesanan Kosong--</p>
                <br>
            <?php } ?>

            <h4 style="margin-top: 1%;">Pesanan Berhasil</h4>
            <?php
            if ($ceksuccess > 0) {
                $data = mysqli_fetch_assoc($resultsuccess);
            ?>

                <?php $i = 1; ?>
                <?php foreach ($successfulorder as $row) : ?>
                    <div class="row featurette" style="margin-top: 2%;">
                        <div class="col-md-7 order-md-2">
                            <div class="row ">
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title" style="margin-top: 2%;">ID Transaksi</h5>
                                    <p class="card-text"><?= $row["transaction_id"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Produk</h5>
                                    <p class="card-text"><?= $row["product"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Harga</h5>
                                    <p class="card-text"><?= number_format($row["cost_price"]) ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Email</h5>
                                    <p class="card-text"><?= $row["email"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Nomor OVO</h5>
                                    <p class="card-text"><?= $row["ovo"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Tanggal</h5>
                                    <p class="card-text"><?=tanggal_indonesia(date('N j/n/Y H:i', strtotime($row['date']))); ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5 class="card-title">Status</h5>
                                    <p class="card-text"><?= $row["status"] ?></p>
                                </div>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <h5>Terimakasih banyak :)</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 order-md-1">
                            <img src="images/<?= $row["image"] ?>" style="max-width : 300px">
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <br>

            <?php
            } else { ?>
                <p style="text-align: center;">--Pesanan Kosong--</p>
                <br>
            <?php } ?>

    </main>
    <!-- FOOTER -->
    <footer class="py-5">
        <div class="medium text-center text-muted">Copyright &copy; 2021 - DesignBy</div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>