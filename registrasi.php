<?php
require 'functions.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil di tambahkan');
                document.location.href = 'login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="" method="post">
    <h2>Halaman Registrasi</h2>
    <label>User Name</label>
    <input type="text" name="username" id="username">
    <label>Password</label>
    <input type="password" name="password" id="Password">
    <label>Konfirmasi Password</label>
    <input type="password" name="password2" id="Password2">

    <button type="submit" name="register">Registrasi</button>
    <a href="login.php" class="ca">Sudah Punya Akun?</a>
</form>
</body>
</html>