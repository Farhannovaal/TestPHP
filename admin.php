
<?php




include_once("function/koneksi.php");
include_once("function/helper.php");


if(isset($_GET['search'])){
    $cari = $_GET['search'];
}


session_start();
if ($_SESSION['username']  == '' ) {
    header("location:".BASE_URL. "login.php"); 
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
    


<a class="home-index" href="<?php echo BASE_URL; ?>index.php"> Kembali Ke Home </a>




<form action="admin.php" method="GET" class="search-form">
    <label> Cari </label>
        <input type="text" id="search" name='search' placeholder="Masukkan ID">                    
</form>

<div class="table-wrapper">

        <form action="<?php echo BASE_URL.'update.php'; ?>" method="POST" class="form-admin">

                    <table>
                        <thead>
                            <tr class='tab'>
                                <th> TiketID </th>
                                <th> Nama </th>
                                <th> Nomor </th>
                                <th> Email </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        <thead>
                <?php


                        if(isset($_GET['search'])){

                                $cari = $_GET['search'];
                                $tampil = mysqli_query($koneksi, " SELECT * FROM penonton where id like '%".$cari."%'");

                        }else {
                            $tampil = mysqli_query($koneksi, "SELECT * FROM penonton ORDER BY id ASC");
                        }

                        while ($row=mysqli_fetch_assoc($tampil)){ 

                            $ticketId = $row['id'];
                            $nama_lengkap = $row["Nama"];
                            $phone = $row["Nomor"];
                            $email = $row["Email"];
                            $status = $row['status'];;

                     
                    echo "<tbody>
                    
                        <tr class='tab'>
                            <td>{$ticketId}</td>
                            <td>{$nama_lengkap}</td>
                            <td>{$phone}</td>
                            <td>{$email}</td>
                            <td>{$status}</td>
                            <td class='button'>
                            <a class='tombol-action' href='".BASE_URL."updateData.php?id=$row[id]' data--id='$row[id]'>Update Status</a>   
                            </td>
                        </tr>
                        
                        <tbody>";


                    }
                
            ?>
                    </table>
    </div>
</form>           
</body>
</html>