<?php  
	require 'fungsi.php';

	if(isset($_POST['submit'])){
//		var_dump($_POST);
//		var_dump($_FILES);
//		die();

		$nama =$_POST['nama'];
		$kampus = $_POST['kampus'];
		$jurusan = $_POST['jurusan'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$tahun = $_POST['tahun'];
		// //$gambar = $_POST['gambar'];

		$gambar = upload();
		if (!$gambar) {
			return false;
		}
		$query = "INSERT INTO kostning VALUES 
				('', '$nama', '$kampus', '$jurusan', '$telp', '$alamat', '$tahun', '$gambar')";
		mysqli_query($conn, $query);

		//return mysqli_affected_rows($conn);

		// var_dump(mysqli_affected_rows($conn));
		if (mysqli_affected_rows($conn) > 0) {
				echo "
			<script>
				alert('data berhasil Ditambahkan');
				document.location.href='../html/datakost.php';
			</script>
			";
		}else{
			// echo "gagal";
			// echo "<br>";
			// echo "msql_error($conn)";
			echo "
			<script>
				alert('data gagal Ditambahkan');
				document.location.href='tambah.php';
			</script>
			";
		}
	}
?>
<?php include '../atribut/head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
	<div class="col-xs-2 "></div>		
    <div class="col-xs-8 ">
    <form method="post" enctype="multipart/form-data">
      <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data
        	<button class="pull-right active"><a href="../html/datakost.php"> Kembali</a></button>
        </div>
        <div class="panel-body">
          <div class="row form-group">
            <b class="col-xs-4">Nama</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="nama"></b><br>
            <b class="col-xs-4 fa fa-graduation-cap">Kampus</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="kampus"></b><br>
            <b class="col-xs-4">Jurusan</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="jurusan"></b><br>
            <b class="col-xs-4">Alamat</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="alamat"></b><br>
            <b class="col-xs-4">Telp</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="telp"></b><br>
            <b class="col-xs-4">Thn_Tinggal</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="text" name="tahun"></b>
            <b class="col-xs-4">Gambar</b> 
            <b class="col-xs-8"><input class="form-control input-sm" type="file" name="gambar"></b>
          </div>
        <div class="panel-footer text-center">
            <button type="submit" name="submit" class="btn-success form form-control">Tambah</button>
        </div>    
        </div>
      </div>
    </form>
    </div>
    <div class="col-xs-2 "></div>		
  </div><br>


</body>
</html>
<?php include '../atribut/foot.php'; ?>