<?php
session_start();

$username = $_SESSION['username'];
$email  = $_SESSION['email'];

require 'function.php';
$stocks = query("SELECT * FROM stocks");

// ambil data di URL
$id = $_GET["id"];

// query data stocks berdasarkan id
$stocks = query("SELECT * FROM stocks WHERE id=$id")[0];


if ($_SESSION['level'] !== "admin") {
    header("location: logout.php");
} else {
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/listshadow.css">

    <title>Detail Product</title>
</head>

<body>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

<!-- Navigation Bar -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="MainNav">
        <div class="container-fluid">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a href="adminpage.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
</header>

<br>


<div class="container" style="min-width: 330px;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/<?= $stocks["preview"] ?>" class="d-block w-100 h-100" alt="...">
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
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">BUY | <?= number_format($stocks["price"])  ?> IDR</button>
    </ul>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation Order</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Design </label>

                            <div class="card mb-3">
                                <img src="images/<?= $stocks["preview"] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $stocks["title"] ?> </h5>
                                    <p class="card-text"><?= nl2br($stocks["description"], false) ?> </p>
                                    <br>
                                    <label for="price">Price</label>
                                    <p> <?= number_format($stocks["price"]) ?> IDR </p>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="username">Username </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="" value="<?= $username ?>" required autocomplete="off" disabled>
                        </div>
                        <div class=" form-group">
                            <label for="email">Email </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="" value="<?= $email ?>" required autocomplete="off" disabled>
                        </div>
                        <div class="form-group">
                            <label for="ovo">OVO Number</label>
                            <input type="text" name="ovo" id="ovo" class="form-control" placeholder="" required autocomplete="off">
                            <input type="hidden" name="image" id="image" class="form-control" value="<?= $stocks["preview"] ?>">
                            <input type="hidden" name="product" id="product" class="form-control" value="<?= $stocks["title"] ?>">
                            <input type="hidden" name="cost_price" id="cost_price" class="form-control" value="<?= $stocks["price"] ?>">
                            <input type="hidden" name="date" id="date" class="form-control" value="<?= date("l" . "," . "d-m-Y") ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <?php
                    if (isset($_POST["order"])) {
                        if (order($_POST) > 0) {
                            echo "<script>
                          alert('Order Successful!');
                          document.location.href='home.php';
                          </script>";
                        } else {
                            echo mysqli_error($conn);
                        }
                    }
                    ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</html>