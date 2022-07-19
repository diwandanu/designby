<?php
require 'function.php';

$id = $_GET["id"];

if (deletestocks($id) > 0) {
    echo "<script>
                alert('Data Deleted Successfully');
                document.location.href='listproducts.php';
            </script>
        ";
} else {
    echo "<script>
                alert('Data Failed to Delete');
                document.location.href='listproducts.php';
            </script>
        ";
}
