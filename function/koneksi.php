<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "transindo-ticket";


    $koneksi = mysqli_connect($server, $username, $password, $database) or die ("koneksi ke database gagal");

?>