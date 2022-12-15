<?php

$conn = mysqli_connect("localhost","root","","sistemll");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
        
    return $rows;
}
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    if ($password !== $password2){
        echo "<script>
            alert('konfimarsi password tidak sesuai');
        </script>";
        
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);


}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;

    $id = $data["id"];
    $nis = htmlspecialchars ($data["nis"]);
    $nama = htmlspecialchars ($data["nama"]);
    $jurusan = htmlspecialchars ($data["jurusan"]);
    $telp = htmlspecialchars ($data["telp"]);
    $alamat = htmlspecialchars ($data["alamat"]);

    $query = "UPDATE siswa SET nis = '$nis',nama ='$nama', jurusan = '$jurusan', telp ='$telp',alamat = '$alamat' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>