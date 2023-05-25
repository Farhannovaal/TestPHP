<?php
session_start();

include_once("function/helper.php");
include_once("function/koneksi.php");



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password)) {
        echo "<h2>Password tidak boleh kosong.</h2>";
    } else {
    
        $query = mysqli_query($koneksi, "SELECT * FROM staff WHERE Username ='$username' AND password_col ='$password'");
    
        if (mysqli_num_rows($query) > 0) {
            $admin = mysqli_fetch_assoc($query);
            $_SESSION['admin_id'] = $admin['admin_id'];
            header("location:".BASE_URL. "admin.php");
            exit();
        } else {
     
            $error = "Username atau password salah.";
        }
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
    <title>Login Panel Staff</title>


</head>
<body>
    <div class="login-wrapper">
        <div class="form-wrapper">
            <form method="POST" action="">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit" name="login">Login</button>
                <a class="register-link "href="<?php echo BASE_URL; ?>register.php"> Belum punya akun ? </a>
            </form>
            <?php
            if (isset($error)) {
               echo "<h2> Gagal Ada Error</h2>";
            }
            ?>
        </div>
    </div>
</body>
</html>
