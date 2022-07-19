<?php
session_start();
require 'function.php';

$transaction_id = $_SESSION['transaction_id'];

// query data stocks berdasarkan transaction_id
$stocks = query("SELECT * FROM orders WHERE transaction_id=$transaction_id")[0];

$isibody = nl2br("Hello, There is a new order. Let's Check it Out : " .
    "\nUsername : " . $stocks["username"] . "\nTransaction ID : " . $stocks["transaction_id"] . "\nProduct : " . $stocks["product"] .
    "\nEmail : " . $stocks["email"] . "\nCost Price : " . number_format($stocks["cost_price"]) . "\nOVO Number : " . $stocks["ovo"] .
    "\nPlease check his/her order on DesignBy.my.id");


require_once("includes/PHPMailer.php");
require_once("includes/SMTP.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();

//Server settings
$mail->isSMTP();
$mail->Host = "mail.designby.my.id";
$mail->SMTPAuth = true;
$mail->Username = "noreply@designby.my.id";
$mail->Password = "Noreplydesignby17";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

$mail->From = "noreply@designby.my.id";
$mail->FromName = "DesignBy";

//Recipients
$mail->addAddress("triandiwandanu17@gmail.com");

//Content
$mail->isHTML(true);
$mail->Subject = "New Order";
$mail->Body = $isibody;

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

if (!$mail->send()) {
    echo "<script>
                alert('Email Gagal!');
                document.location.href='order.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Pesananmu akan dikirim segera melalui email yang terdaftar');
                document.location.href='order.php';
            </script>
        ";
}
