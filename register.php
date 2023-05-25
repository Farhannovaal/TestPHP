<?php

include_once("function/koneksi.php");
include_once("function/helper.php");

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel=stylesheet>
    <title> Register Staff Account </title>
</head>
<body>
        <div class="register-wrapper">

            <form action="" method="POST">
            <h2> Registrasi Acoount Staff  </h2>
                <input type="text" class="username" name="username" placeholder="masukan username">
                <input type="text" class="password" name="password" placeholder="masukan password">
                <button type="submit" name="kirim">Submit</button>
            </form>

        </div>
                 <?php
                        if (isset($_POST["kirim"])) {
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            $queryRegis = mysqli_query($koneksi, "INSERT INTO staff (Username, password_col, status) VALUES ('$username', '$password','on')");
                            if ($queryRegis) {
                                echo "Data berhasil disimpan";
                                header("location:".BASE_URL. "login.php");
                            } else {
                                echo "Terjadi kesalahan: " . mysqli_error($koneksi);
                            }
                        }
                        ?>

</body>
</html>
