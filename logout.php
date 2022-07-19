<?php
session_start();
session_destroy();
$_SESSION['level'] = "";

header("Location: login.php");
exit;
?>
