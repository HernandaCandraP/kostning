<?php 
	require 'fungsi.php';
	$id = $_GET["id"];
	$kost = query("SELECT * FROM kostning WHERE id = $id");

if(isset($_POST['submit'])){
	if(edit($_POST)>0){
		echo "
		<script>
			alert('data berhasil disimpan');
			document.location.href='../html/datakost.php';
		</script>
		";
	}else{
		echo "
		<script>
			alert('data gagal disimpan');
			// document.location.href='../html/datakost.php';
		</script>";
		echo "<br>";
		echo mysqli_error($conn);
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
        <div class="panel-heading">Edit Data
        	<button class="pull-right active"><a href="../html/datakost.php"> Kembali</a></button>
        </div>
        <div class="panel-body">
          <div class="row form-group">
            <b class="col-xs-4">Nama</b> 
            <b class="col-xs-8">
            	<input class="form-control input-sm" type="text" name="nama" id="nama" value="<?=$kost[0]['nama']?>">
				<input type="hidden" name="id" id="id" value="<?=$kost[0]['id']?>">
            </b><br>
            <b class="col-xs-4 fa fa-graduation-cap">Kampus</b> 
            <b class="col-xs-8">
            	<input class="form-control input-sm" type="text" name="kampus" id="kampus" value="<?=$kost[0]['kampus']?>"></b><br>
            <b class="col-xs-4">Jurusan</b> 
            <b class="col-xs-8">
                <input class="form-control input-sm" type="text" name="jurusan" id="jurusan" value="<?=$kost[0]['jurusan']?>"></b><br>
            <b class="col-xs-4">Alamat</b> 
            <b class="col-xs-8">
                <input class="form-control input-sm" type="text" name="alamat" id="alamat" value="<?=$kost[0]['alamat']?>"></b><br>
            <b class="col-xs-4">Telp</b> 
            <b class="col-xs-8">
            	<input class="form-control input-sm" type="text" name="telp" id="telp" value="<?=$kost[0]['telp']?>"></b><br>
            <b class="col-xs-4">Thn_Tinggal</b> 
            <b class="col-xs-8">
            	<input class="form-control input-sm" type="text" name="tahun" id="tahun" value="<?=$kost[0]['tahun']?>"></b>
            <b class="col-xs-4">Gambar</b> 
            <b class="col-xs-8">
                <input class="form-control input-sm" type="file" name="gambar" value="<?=$kost[0]['gambar']?>">
                <input type="hidden" name="gambarlama" id="gambarlama" value="<?=$kost[0]['gambar']?>">
            </b>
          </div>
        <div class="panel-footer text-center">
            <button type="submit" name="submit" class="btn-success form form-control">Edit</button>
        </div>    
        </div>
      </div>
    </form>
    </div>
    <div class="col-xs-2 "></div>		
  </div>
</body>
</html>
<?php include '../atribut/foot.php'; ?>