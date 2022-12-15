<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
?>
<html>
<head>
	<title>Aplikasi Input SMA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container col-md-6 mt-4">
		<h1>SILAHKAN INPUT DATA SISWA</h1>
		<a href="./" class="btn btn-sm btn-primary float-right">Kembali</a>
		<div class="card-body">
			<form action="input.php" method="POST" role="from">
				<div class="form-group">
					<label>Nis</label>
					<input type="text" name="nis" required="" class="form-control">
				</div>
				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" name="nama" required="" class="form-control">
				</div>
				<div class="form-group">
					<label>Jurusan</label>
					<input type="text" name="jurusan" required="" class="form-control">
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input type="text" name="telp" required="" class="form-control">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" required="" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary" name="Submit" value="Submit">Kirim</button>
				<button type="reset" class="btn btn-warning" name="Reset" value="Reset">Reset</button>
			</form>
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>