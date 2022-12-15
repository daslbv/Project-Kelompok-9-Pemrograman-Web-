<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
	require 'functions.php';
	if ($_POST['Submit'] == "Submit") {
	$nis	=$_POST['nis'];
	$nama	=$_POST['nama'];
	$jurusan=$_POST['jurusan'];
	$telp	=$_POST['telp'];
	$alamat	=$_POST['alamat'];
	
	$ceknis	=mysqli_num_rows (mysqli_query($conn, "SELECT nis FROM siswa WHERE nis='$_POST[nis]'"));
	
	if($ceknis > 0) {
	?>
		<script language="JavaScript">
			alert('MAAf ! SEPERTINYA DATA INI SUDAH PERNAH DI INPUT');
			document.location='form-input.php';
		</script>
	<?php
	}
		
	else{
		$insert =mysqli_query($conn, "INSERT INTO siswa (nis, nama, jurusan, telp, alamat) VALUES ('$nis', '$nama', '$jurusan', '$telp', '$alamat')");
		?>
			<script language="JavaScript">
			alert('Good! Input Data Siswa Berhasil');
			document.location='./';
			</script>
		<?php
		}
	}
?>