<?php
session_start();

$username = $_SESSION['username'];
$email  = $_SESSION['email'];
$id_costumer = $_SESSION['id_costumer'];

include 'function.php';

if (isset($_POST["submit"])) {
    $oldpassword = $_POST["oldpassword"];

    $result = mysqli_query($conn, "SELECT * FROM costumers WHERE password = '$oldpassword' ");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        if (changepass($_POST) > 0) {
            echo "<script>
                alert('Change Password Successful!');
                document.location.href='home.php';
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $error = true;
    }
}

if ($_SESSION['level'] !== "user") {
    header("location: logout.php");
} else {
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
    <link rel="stylesheet" type="text/css" href="css/shadow.css">
    <title>Change Password Page</title>
</head>

<body>

    <br><br><br>
    <div class="container" style="min-width: 330px;">
        <h2 class="text-center">Ganti Password</h2>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><br>Password Lama Tidak Sesuai</p>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="oldpassword">Password Lama</label>
                <input type="password" name="oldpassword" id="oldpassword" class="form-control" placeholder="" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="newpassword">Password Baru</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="" required autocomplete="off" pattern=".{6,}" title="Password Harus 6 Karakter atau Lebih">
            </div>
            <div class="form-group">
                <label for="newpassword2">Konfirmasi Password Baru</label>
                <input type="password" name="newpassword2" id="newpassword2" class="form-control" placeholder="" required autocomplete="off" pattern=".{6,}" title="Password Harus 6 Karakter atau Lebih">
            </div>
            <a href="home.php" class="btn btn-secondary">Cancel</a>
            <button type="submit" name="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="py-5">
        <div class="medium text-center text-muted">Copyright &copy; 2021 - DesignBy</div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>

</html>