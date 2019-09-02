<?php  
	$conn=mysqli_connect("localhost", "root","", "kostning");

	$sql="SELECT * from kostning";
	$exe= mysqli_query($conn, $sql);
	$i=1;

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data['username']));

	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

	if(mysqli_fetch_assoc($result)){
		echo "
			<script> alert('username sudah ada'); </script>
		";
		return false;
	}
	if($password !== $password2){
		echo "
			<script> alert('password anda tidak sama'); </script>
		";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$sql= "SELECT * FROM kostning WHERE
			nama LIKE '%$keyword%' OR
			kampus LIKE '%$keyword%' OR
			jurusan LIKE '%$keyword%' OR
			telp LIKE '%$keyword%' OR
			alamat LIKE '%$keyword%' OR
			tahun LIKE '%$keyword%'";

	return query($sql);
}

function upload(){
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpfile = $_FILES['gambar']['tmp_name'];

	if ($error==4) {
		echo "
		<script>
			alert('tidak ada gambar yang di-upload');
		</script>";
		return false;
	}

	$jenis_gambar= ['jpg', 'jpeg', 'gif'];
	$pecah_gambar= explode('.', $nama_file);
	$pecah_gambar= strtolower(end($pecah_gambar));
	if (!in_array($pecah_gambar, $jenis_gambar)) {
		echo "
		<script>
			alert('Yang di-upload bukan gambar');
		</script>";
		return false;
	}

	if ($ukuran_file > 1000000) {
		echo "
		<script>
			alert('ukuran gambar terlalu besar');
		</script>";
		return false;
	}
	//move_uploaded_file($tmpfile, 'img/'.$nama_file);
	//return $nama_file;

	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $pecah_gambar;
	//var_dump($namafilebaru); die();
	move_uploaded_file($tmpfile, '../img/profile/'.$namafilebaru);
	// echo "<script> 
	// 	document.location.href='../html/datakost.php'
	// 	</script>";
	return $namafilebaru;
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM kostning WHERE id=$id");
	return mysqli_affected_rows($conn);
}

function query($sql){
	global $conn;
	$exe = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_array($exe)){
		$row[] = $data;
	}
	return $row;
}

function edit($data){
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$kampus = htmlspecialchars($data["kampus"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$telp = htmlspecialchars($data["telp"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	if($_FILES['gambar'][error]===4){
		$gambar = $gambarlama;
	}else{
		$gambar = upload();
	}

	$query= "UPDATE kostning SET 
					nama = '$nama',
					kampus = '$kampus',
					jurusan = '$jurusan',
					telp = '$telp',
					alamat = '$alamat',
					tahun = '$tahun',
					gambar = '$gambar'
					WHERE id = $id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>