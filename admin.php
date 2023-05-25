
<?php


session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");



if (!isset($_SESSION['id'])) {
    header("location:".BASE_URL. "login.php"); 
    exit();
}

    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel=stylesheet>
    <title> Staff Admin </title>

</head>
<body>
    

<div class="table-wrapper">

        <form action="<?php echo BASE_URL.'update.php'; ?>" method="POST" class="form-admin">

        <a class="home-index" href="<?php echo BASE_URL; ?>index.php"> Kembali Ke Home </a>
        <input type="text" id="BahanInput" placeholder="Masukkan ID">
                        <button onclick="searchTiket()">Cari</button>
                    <table id="dataTable">
                        <tr class='tab'>
                        <td> TiketID </td>
                        <td> Nama </td>
                        <td> Nomor </td>
                        <td> Email </td>
                        <td>Status</td>
                        <td>Action</td>
                        </tr>
                <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM penonton ORDER BY id ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $ticketId = $row['id'];
                            $nama_lengkap = $row["Nama"];
                            $phone = $row["Nomor"];
                            $email = $row["Email"];
                            $status = $row['status'];;

                    echo "<tr class='tab'>
                            <td>{$ticketId}</td>
                            <td>{$nama_lengkap}</td>
                            <td>{$phone}</td>
                            <td>{$email}</td>
                            <td>{$status}</td>
                            <td class='button'>
                            <a class='tombol-action' href='".BASE_URL."updateData.php?id=$row[id]' data--id='$row[id]'>Update Status</a>   
                            </td>
                            </tr>";
                    }
            ?>
                    </table>
    </div>
</form>           
<script src="edit.js"></script>
</body>
</html>