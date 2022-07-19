<?php
session_start();
$transaction_id = $_SESSION['transaction_id'];

require 'function.php';

// ambil data di URL
// $transaction_id = $_GET["transaction_id"];

// query data stocks berdasarkan id
$stocks = query("SELECT * FROM orders WHERE transaction_id=$transaction_id")[0];

$isibody = nl2br("Hello, There is a new order. Let's Check it Out : " .
    "\nUsername : " . $stocks["username"] . "\nTransaction ID : " . $stocks["transaction_id"] . "\nProduct : " . $stocks["product"] .
    "\nHis/Her email : " . $stocks["email"] . "\nCost Price : " . number_format($stocks["cost_price"]) . "\nOVO Number : " . $stocks["ovo"] .
    "\nPlease check his/her order on DesignBy.my.id");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = '587';
    $mail->Username = 'noreplydesignby@gmail.com';
    $mail->Password = 'Googleteros17';

    //Recipients
    $mail->setFrom('noreplydesignby@gmail.com', 'DesignBy');
    $mail->addAddress('triandiwandanu17@gmail.com');     //Add a recipient


    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Order';
    $mail->Body    = $isibody;

    $mail->send();
    echo "<script>
                alert('Pesananmu akan dikirim segera melalui email yang terdaftar');
                document.location.href='order.php';
            </script>
        ";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
