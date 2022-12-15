<?php
session_start();
require 'functions.php';

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1 ) {

        //  cek password

        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {

            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
        <?php if( isset($error) ):?>
        <p style="color: red; font-style: italic">username/ password salah</p>
        <?php endif; ?>
     <form action="" method="post">
     	<h2>LOGIN</h2>
     	<label>User Name</label>
     	<input type="text" name="username" id="username"><br>
        <label>Password</label>
     	<input type="password" name="password" id="password"><br>
        <label>Konfirmasi Password</label>
     	<input type="password" name="password2" id="password"><br>


     	<button type="submit" name="login">Login</button>
        <a href="registrasi.php" class="ca">Belum Punya Akun?</a>
     </form>
</body>
</html>