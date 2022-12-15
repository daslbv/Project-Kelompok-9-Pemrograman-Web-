<?php
	require 'functions.php';

	$id = $_GET["id"];
	if( isset($_POST["submit"])){

		if( ubah($_POST) > 0 ) {
			echo"<script>
				alert('data berhasil di ubah!');
				document.location.href = 'index.php';
			</script>";
		}else{
			echo"<script>
				alert('data gagal di ubah!');
				document.location.href = 'index.php';
			</script>";
		}
	}
	$query	=mysqli_query($conn, "SELECT * FROM ageng WHERE id='$id'");
	$row	=mysqli_fetch_array($query);
?>
<html>
<head>
	<title>Edit Data Siswa</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container col-md-6 mt-4">
	<h1>SILAHKAN EDIT DATA SISWA</h1>
	<a href="./" class="btn btn-sm btn-primary float-right">Kembali</a>
	<form action="edit.php?id=<?=$id?>" method="POST" role="from">
	<div class="form-group">
	<label>Nis</label>
	<input type="text" name="nis" required="" class="form-control" value="<?php echo $row['nis']?>">
	<input type="hidden" name="id" value="<?= $siswa["id"]; ?>">
	</div>
	<div class="form-group">
	<label>Nama Siswa</label>
	<input type="text" name="nama" required="" class="form-control"value="<?php echo $row['nama']?>">
	</div>
	<div class="form-group">
	<label>Jurusan</label>
	<input type="text" name="jurusan" required="" class="form-control"value="<?php echo $row['jurusan']?>">
	</div>
	<div class="form-group">
	<label>No. Telp</label>
	<input type="text" name="telp" required="" class="form-control"value="<?php echo $row['telp']?>">
	</div>
	<div class="form-group">
	<label>Alamat</label>
	<input type="text" name="alamat" required="" class="form-control"value="<?php echo $row['alamat']?>">
	</div>
	<button type="submit" class="btn btn-primary" name="Edit" value="Edit">Edit</button>
	<button type="reset" class="btn btn-warning" name="Reset" value="Reset">Reset</button>
	</form>
</body>
</html>