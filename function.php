<?php
$conn = mysqli_connect("localhost", "root", "", "databasephp");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;

    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $email = strtolower(stripcslashes($data["email"]));
    $ovo = $data["ovo"];

    //email double check
    $result = mysqli_query($conn, "SELECT email FROM costumers
     WHERE email='$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email Telah Digunakan!')
              </script>";
        return false;
    }


    //confirmation password check
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi Password Tidak Cocok!');
            </script>";
        return false;
    }
    
    //this is for passsword encription
    // $password = password_hash($password, PASSWORD_DEFAULT);

    //insert to database "databasephp"
    mysqli_query($conn, "INSERT INTO costumers (username, password, email, ovo, level) VALUES('$username', '$password', '$email','$ovo', 'user')");
     
     

    return mysqli_affected_rows($conn);
}


function submitdata($data)
{
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $price = htmlspecialchars($data["price"]);

    // upload preview image
    $preview = upload();
    if (!$preview) {
        return false;
    }

    // upload another image
    $image = upload2();
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO stocks (title, price, description, preview, image) VALUES ('$title', '$price','$description', '$preview', '$image')";
    

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $nameFile = $_FILES['preview']['name'];
    $sizeFile = $_FILES['preview']['size'];
    $error = $_FILES['preview']['error'];
    $tmpName = $_FILES['preview']['tmp_name'];

    // cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Please Insert with Images Extension!');
        </script>";
        return false;
    }

    // cek size file yang diupload
    // if ($sizeFile > 100) {
    //     echo "<script>
    //     alert('File Size Is Too Large'!');
    // </script>";
    //     return false;
    // }

    // setelah pengecekan beberapa kali, gambar(preview) siap upload
    $nameNewFile = uniqid();
    $nameNewFile .= '.';
    $nameNewFile .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/' . $nameNewFile);

    return $nameNewFile;
}


function upload2()
{
    $nameFile = $_FILES['image']['name'];
    $sizeFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Please Insert with Images Extension!');
        </script>";
        return false;
    }


    // setelah pengecekan beberapa kali, gambar(preview) siap upload
    $nameNewFile = uniqid();
    $nameNewFile .= '.';
    $nameNewFile .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'images/' . $nameNewFile);

    return $nameNewFile;
}


// ini buat table stocks
function deletestocks($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM stocks WHERE id=$id");
    return mysqli_affected_rows($conn);
}

//ini buat table order
function cancelorders($transaction_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM orders WHERE transaction_id=$transaction_id");
    return mysqli_affected_rows($conn);
}


// buat edit produk
function editstocks($data)
{
    global $conn;
    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $price = htmlspecialchars($data["price"]);
    $description = htmlspecialchars($data["description"]);
    $oldPreview = htmlspecialchars($data["oldPreview"]);
    $oldImage = htmlspecialchars($data["oldImage"]);


    // cek apakah preview ditambahkan baru atau tidak
    if ($_FILES['preview']['error'] === 4) {
        $preview = $oldPreview;
    } else {
        $preview = upload();
    }

    // cek apakah preview ditambahkan baru atau tidak
    if ($_FILES['image']['error'] === 4) {
        $image = $oldImage;
    } else {
        $image = upload2();
    }


    $query = "UPDATE stocks SET
                title = '$title', price='$price', description = '$description', preview = '$preview', image = '$image' 
                WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


date_default_timezone_set("Asia/Jakarta");
$waktu_lengkap = date('N j/n/Y H:i:s');
function tanggal_indonesia($waktu_lengkap)
{
    $nama_hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $nama_bulan = array(1 => 'Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    $pisah_waktu = explode(" ", $waktu_lengkap);
    $hari = $pisah_waktu[0];
    $tanggal = $pisah_waktu[1];
    $jam = $pisah_waktu[2];

    $hari_baru = $nama_hari[$hari];
    $pisah_tanggal = explode("/", $tanggal);
    $tanggal_baru = $pisah_tanggal[0] . " " . $nama_bulan[$pisah_tanggal[1]] . " " . $pisah_tanggal[2];

    return $hari_baru . ", " . $tanggal_baru . " - Jam " . $jam . " WIB";
}

function order($data)
{
    global $conn;

    $id = $data["id"];
    $image = $data["image"];
    $product = $data["product"];
    $cost_price = $data["cost_price"];
    $username = $_SESSION['username'];
    $email  = $_SESSION['email'];
    $ovo = $_SESSION['ovo'];

    //penambahan
    $idcostumer = $_SESSION['id_costumer'];
    $dateid = date("dmy");
    $cekmaxid = $idcostumer . $dateid . $id;
    $transaction_id = $cekmaxid . "0";
    $transaction_id = (int)$transaction_id;

    $hasilcari = mysqli_query($conn, "SELECT * FROM orders WHERE transaction_id = '$transaction_id'");
    $cekcari = mysqli_num_rows($hasilcari);
    if ($cekcari > 0) {
        $data = mysqli_fetch_assoc($hasilcari);
        $hasilmax = mysqli_query($conn, "SELECT max(transaction_id) as maxID from orders WHERE transaction_id LIKE '$cekmaxid%'");
        $cekmax = mysqli_fetch_array($hasilmax);

        $penambahan_id = $cekmax['maxID'];
        $penambahan_id++;

        $query = "INSERT INTO orders (transaction_id, image, product, cost_price, username, email, ovo, status, payment) VALUES('$penambahan_id','$image', '$product', '$cost_price',
        '$username', '$email', '$ovo','Pending','-')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    } else {
        $data = mysqli_fetch_assoc($hasilcari);
        $query = "INSERT INTO orders (transaction_id, image, product, cost_price, username, email, ovo, status, payment) VALUES('$transaction_id','$image', '$product', '$cost_price',
        '$username', '$email', '$ovo','Pending','-')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
}

function changepass($data)
{
    global $conn;
    $username = $_SESSION['username'];
    $newpassword = mysqli_real_escape_string($conn, $data["newpassword"]);
    $newpassword2 = mysqli_real_escape_string($conn, $data["newpassword2"]);

    $result = mysqli_query($conn, "SELECT password FROM costumers
        WHERE username='$username'");

    //old password check
    if ($newpassword !== $newpassword2) {
        echo "<script>
            alert('Konfirmasi Password Tidak Cocok!');
            </script>";
        return false;
    }



    //insert to database "databasephp"
    mysqli_query($conn, "UPDATE costumers SET password='$newpassword' WHERE username='$username' ");

    return mysqli_affected_rows($conn);
}

function payment($data)
{
    global $conn;
    $transaction_id = htmlspecialchars($data["transaction_id"]);

    // upload preview image
    $preview = paymentupload();
    if (!$preview) {
        return false;
    }


    $query = "UPDATE orders SET status = 'Telah Dibayar', payment = '$preview' WHERE transaction_id='$transaction_id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function paymentupload()
{
    $nameFile = $_FILES['payment']['name'];
    $tmpName = $_FILES['payment']['tmp_name'];

    // cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $nameFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Harap Masukan File Dengan Ekstensi Yang Sesuai!');
        </script>";
        return false;
    }



    // setelah pengecekan beberapa kali, gambar(preview) siap upload
    $nameNewFile = uniqid();
    $nameNewFile .= '.';
    $nameNewFile .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'payment/' . $nameNewFile);

    return $nameNewFile;
}

function sent($transaction_id)
{
    global $conn;
    mysqli_query($conn, "UPDATE orders SET status = 'Berhasil' WHERE transaction_id=$transaction_id");
    return mysqli_affected_rows($conn);
}

function search($keyword)
{
    $query="SELECT * FROM orders WHERE
            username LIKE '%$keyword%' OR
            transaction_id LIKE '%$keyword%' OR
            product LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            ovo LIKE '%$keyword%'
            ";
    return query($query);
}