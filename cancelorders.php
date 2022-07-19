<?php
require 'function.php';

$transaction_id = $_GET["transaction_id"];

if (cancelorders($transaction_id) > 0) {
    echo "<script>
                alert('Pesanan Berhasil Di Cancel');
                document.location.href='order.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Pesanan Gagal Di Cancel');
                document.location.href='order.php';
            </script>
        ";
}
