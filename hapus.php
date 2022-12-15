<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
	require 'functions.php';

	$id = $_GET["id"];

	if( hapus ($id)> 0) {
		echo"
		<script>
				alert('KEREN! Hapus data siswa berhasil');
				document.location='index.php';
				</script>
		";
	}else{
		echo"
		<script>
				alert('Data Gagal ...');
				document.location='index.php';
				</script>
		";
	}
?>