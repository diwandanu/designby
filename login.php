<?php
session_start();
include 'function.php';

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM costumers WHERE email = '$email' AND password = '$password' ");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($result);

        if ($data['level'] == "admin") {
            $_SESSION['level'] = "admin";
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id_costumer'] = $data['id_costumer'];
            header("location:adminpage.php");
        } else if ($data['level'] == "user") {
            $_SESSION['level'] = "user";
            $_SESSION['username']  = $data['username'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['id_costumer'] = $data['id_costumer'];
            $_SESSION['ovo'] = $data['ovo'];
            header("location:home.php");
        }
    } else {
        $error = true;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/shadow.css">
    <title>Login Page</title>
</head>

<body>

    <br><br><br>
    <div class="container" style="min-width: 350px;">
        <h2 class="text-center">Login</h2>

        <?php if (isset($error)) : ?>
            <p style="color: red;"><br>Incorrect Username or Password</p>
        <?php endif; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
            </div>
            <button type="submit" name="login" class="btn btn-warning">Login</button>
        </form>
        <p>
            Belum Punya Akun? <a href="registrasi.php">Registrasi</a>
        </p>
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