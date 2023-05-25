    
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
    <title> Pemesanan Tiket Acara </title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
<div class="container1">

    <h1 class="mainFont"> Selamat Datang di Halaman Pemesanan Tiket </h1>


<div class="form-wrapper">
        <form action="<?php echo BASE_URL.'dataPeserta.php'; ?>" method="POST">
        <!-- @csrf -->
      <h2> Masukan Data Diri Anda </h2>
        <div class="element-form">
          
            <span><input type="text" name="nama_lengkap" value="" placeholder=" Masukan Nama Lengkap " required/></span>
        </div>

        <div class="element-form">
            
            <span><input type="text" name="email" value="" placeholder="Masukan Email " required /></span>
        </div>

        <div class="element-form">
          
            <span><input type="text" name="phone" value="" placeholder="Masukan Nomor Telfon" required /></span>
        </div>
      
        <div class="element-form">
           <button name="button"> Kirim Pesanan </button>
        </div>

        </form>
</div>


    <?php
            
                    if (isset($_POST["button"])) {
                   
                        $nama_lengkap = $_POST["nama_lengkap"];
                        $phone = $_POST["phone"];
                        $email = $_POST["email"];

                        $queryTambah = mysqli_query($koneksi, "INSERT INTO penonton (Nama, Email, Nomor, status) VALUES ('$nama_lengkap', '$email', '$phone', 'aktif')");
                        if ($queryTambah){
                            echo "Data berhasil disimpan";
                        
                        } else {
                            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
                        } 
                            }
                    
            ?>
           


</body>
</html>