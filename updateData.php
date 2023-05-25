<?php
include_once("function/koneksi.php");
include_once("function/helper.php");

session_start();

$id = $_GET['id'];

if(isset($_POST['submit'])) {
    $status = $_POST['status'];
    $querySet = mysqli_query($koneksi, "UPDATE penonton SET status='$status' WHERE id='$id'");
    // Berikan notifikasi berhasil atau gagal
    if($querySet) {
        header("Location: admin.php");
        exit(); // Hentikan eksekusi kode setelah pengalihan header
    } else {
        echo "Data gagal diupdate.";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel=stylesheet>
    <title>Update Data Penonton </title>
</head>
<body>

<div class="input-table">
    <form method="POST" action="<?php echo BASE_URL.'/updateData.php?id='.$id; ?>">


        <h2> Update Data Penonton </h2>
        <table>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM penonton WHERE id='$id'");

            while($row = mysqli_fetch_assoc($query)){
                $status = $row["status"];
                echo "<tr class='tab'>
                        <td> $row[id] </td>
                        <td> $row[Nama] </td>
                        <td> $row[Email] </td>
                        <td class='verif-div'>
                            <input type='radio' value='Tidak-Aktif' name='status' ".($status == 'Tidak-Aktif' ? 'checked' : '')." /> Tidak-Aktif
                            <input type='radio' value='Aktif' name='status' ".($status == 'Aktif' ? 'checked' : '')." /> Aktif
                        </td>   
                    </tr>";
            }
            ?>
        </table>
        <div class="btn-wrapper">
            <input type="submit" name="submit" value="Simpan" class="submit">
            <input type="submit" name="cancel" value="cancel" class="cancel">
        </div>
    </form>
</div>
    
</body>
</html>