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
    <title> Data Peserta </title>
</head>
<body>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data Peserta </title>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>

<?php

$queryData = mysqli_query($koneksi, "SELECT * FROM penonton ORDER BY id ASC");
while ($row = mysqli_fetch_assoc($queryData)) {

    $ticketId = $row['id'];
    $nama_lengkap = $row["Nama"];
    $phone = $row["Nomor"];
    $email = $row["Email"];
    $status = $row['status'];
}

?>




<div class="data-wrapper">


    <div class="form-wrapper">
        <form action="pembayaran.php" method="POST" enctype="multipart/form-data">
            <h2> Nomor ID Tiket <?php echo ($ticketId)?></h2>
            <input type="text" name="waktu" value="<?php echo($email) ?>" readonly>
            <input type="text" name="nama_lengkap" value="<?php echo ($nama_lengkap)  ?>" readonly>
            <input type="text" name="nomor" value="<?php echo ($phone) ?>" readonly>
        </form>
    </div>



</div>
</body>
</html>











</body>
</html>