<?php
session_start();
require 'function.php';

$transaction_id = $_SESSION['transaction_id'];

// query data stocks berdasarkan transaction_id
$stocks = query("SELECT * FROM orders WHERE transaction_id=$transaction_id")[0];

$isibody = nl2br("Terimakasih sudah membeli desain di website DesignBy. Berikut adalah rincian pembelian yang telah kamu selesaikan :
\nUsername : " . $stocks["username"] . "\nTransaction ID : " . $stocks["transaction_id"] . "\nNama Produk : " . $stocks["product"] .
    "\nEmail : " . $stocks["email"] . "\nHarga : " . number_format($stocks["cost_price"]) . "\nNomor OVO : " . $stocks["ovo"]);


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
$mail->addAddress($stocks["email"]);

//Content
$mail->isHTML(true);
$mail->Subject = "Invoice Pembelian DesignBy";
$mail->Body = $isibody;

//Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

if (!$mail->send()) {
    echo "<script>
                alert('Email Gagal!');
                document.location.href='listorder.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Invoice akan dikirim via email pembeli');
                document.location.href='listorder.php';
            </script>
        ";
}
