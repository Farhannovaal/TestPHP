<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Register Staff Account </title>
</head>
<body>
    


                <h2> HALLO WORLD </h2>

<form action="" method="POST">
                <input type="text" class="username" name="username">


                <input type="text" class="password" name="password">


                <button type="submit" name="kirim">Submit</button>

</form



                        <?php
                        if (isset($_POST["kirim"])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $queryRegis = mysqli_query($koneksi, "INSERT INTO staff ( username, password, ) VALUES ('$username', '$password')");
                            if ($queryRegis) {
                                echo "Data berhasil disimpan";
                            } else {
                                echo "Terjadi kesalahan: " . mysqli_error($koneksi);
                            }
                        }
                        ?>

</body>
</html>
