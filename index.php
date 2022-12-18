<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

?>
<html>
<head>
	<title>Website Data SISWA SISWI SMA</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container text-center">
	<div class="card">
	<div class="card-header bg-success text-white ">
	<h2>Data Siswa SMA</h2><a href="form-input.php" class="btn btn-sm btn-primary float-right">Tambah Data</a>
	</div>
	<a href="logout.php" class="btn btn-sm btn-primary float-right">Keluar</a>
	<div class="card-body">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>			
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jurusan</th>
				<th>No Hp</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require 'functions.php';
				$siswa = query("SELECT * FROM siswa");
			?>
			<tr>
			<?php $i = 1; ?>
        	<?php foreach( $siswa as $row ) : ?>			
				<td><?php echo $i;?></td>
				<td><?php echo $row['nis']?></td>
				<td><?php echo $row['nama']?></td>
				<td><?php echo $row['jurusan']?></td>
				<td><?php echo $row['telp']?></td>
				<td><?php echo $row['alamat']?></td>
				<td>
				<a href="ubah.php?id=<?=$row['id']?>" class="btn btn-warning" role="button">Edit</a>
				<a href="hapus.php?id=<?=$row["id"]
				?>" class="btn btn-danger" role="button"onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini Dari from Database?');">Hapus</a></td>
			</tr>
			<?php $i++; ?>
        	<?php endforeach; ?>
		</tbody>
	</table>
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>