<?php
session_start();
require 'function.php';

$transaction_id = $_GET["transaction_id"];

if (sent($transaction_id) > 0) {
  $_SESSION['transaction_id'] = $transaction_id;
  echo "<script>
                alert('Data Confirm Successfully');
                document.location.href='mailinvoice.php';
            </script>
        ";
} else {
  echo "<script>
            alert('Data Failed to Confirm');
            document.location.href='listorder.php';
          </script>
        ";
}
