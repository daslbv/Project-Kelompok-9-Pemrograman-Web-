<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
	require 'functions.php';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	else {
		die ("Koneksi Dengan MySQL gagal ");	
	}
	$query	=mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
	$row	=mysqli_fetch_array($query);
	$notnis	=$row['nis'];
	
	if ($_POST['Edit'] == "Edit") {
	$nis	=$_POST['nis'];
	$nama	=$_POST['nama'];
	$jurusan=$_POST['jurusan'];
	$telp	=$_POST['telp'];
	$alamat	=$_POST['alamat'];
	
	$ceknis	=mysqli_num_rows (mysqli_query($conn, "SELECT nis FROM siswa WHERE nis='$_POST[nis]' AND nis!='$notnis'"));
	
	if($ceknis > 0) {
	?>
		<script language="JavaScript">
			alert('MAAf ! SEPERTINYA DATA INI SUDAH PERNAH DI INPUT ');
			document.location='edit.php?id=<?=$id?>';
		</script>
	<?php
	}
	else{
		$update =mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama='$nama', jurusan='$jurusan', telp='$telp', alamat='$alamat' WHERE id='$id'");
		?>
			<script language="JavaScript">
			alert('Keren! Edit Data Siswa Berhasil');
			document.location='./';
			</script>
		<?php
	}
}
?>