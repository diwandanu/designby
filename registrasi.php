<?php
require 'function.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('Registration Successful!');
            document.location.href='login.php';
            </script>";
  } else {
    echo "<script>
            alert('Registration Gagal!');
            document.location.href='registrasi.php';
            </script>";
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

  <title>Halaman Registrasi</title>
  <style>
    label {
      display: block;
    }
  </style>
</head>

<body>

  <br><br><br>
  <div class="container" style="min-width: 350px;">
    <h2 class="text-center">Registrasi</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Nama Pengguna</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="" required autocomplete="off" onkeypress="return /[a-z ]/i.test(event.key)">
      </div>
      <div class="form-group">
        <label for="email">Email </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="" required autocomplete="off">
      </div>
      <div class="form-group">
        <label for="ovo">Nomor OVO</label>
        <input type="text" name="ovo" id="ovo" class="form-control" placeholder="" required autocomplete="off" onkeypress="return /[0-9]/i.test(event.key)">
      </div>
      <div class=" form-group">
        <label for="password">Password </label>
        <input type="password" name="password" id="password" class="form-control" placeholder="" required pattern=".{6,}" title="Password Harus 6 Karakter atau Lebih">
      </div>
      <div class="form-group">
        <label for="password2">Konfirmasi Password </label>
        <input type="password" name="password2" id="password2" class="form-control" placeholder="" required pattern=".{6,}" title="Password Harus 6 Karakter atau Lebih">
      </div>
      <button type="submit" name="register" class="btn btn-warning">Register</button>
    </form>
    <p>
      Sudah Punya Akun ? <a href="login.php">Login</a>
    </p>
    <a href="about.php">Tentang Kami</a>
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