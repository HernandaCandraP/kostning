<?php  

  session_start();
  if(!isset($_SESSION["login"])){
  echo $_SESSION["login"];
  header("Location: ../security/login.php");
  exit;
  }
	require '../atribut/fungsi.php';

	if(isset($_POST['register'])){
		if(registrasi($_POST)>0){
			echo "
			<script> 
				alert('user berhasil ditambahkan');
				document.location.href='../security/login.php';
			</script>";
		}else{
			echo 
			"<script> 
				alert('user gagal ditambahkan'); 
				document.location.href='../security/registrasi.php';
			</script>";
			echo mysqli_error($conn);
		}
	}
?>
<?php include '../atribut/head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>
<body>

<header>
  <div class="overlay "></div>
  <div class="container h-100">
    <div class="d-flex h-100">
      <div class="w-100 ">


  <div class="row">
  	<div class="col-sm-4"></div>
  	<div class="col-sm-4">
  		<div class="login-form">
	    <form action="" method="post">
	        <h2 class="text-center">Registrasi Login</h2>       
	        <div class="form-group">
	            <input type="text" class="form-control" placeholder="Username" required="required" name="username" id="username"> 
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Konfirmasi Password" required="required" name="password2" id="password2">
	        </div>      
	        <div class="form-group">
	            <button type="submit" class="btn btn-success btn-block " name="register">Registrasi</button>
	        </div> <br>
	    	<p class="text-center pull-right"><a href="../security/login.php">Have Account</a></p>	        
	    </form>
	</div>
  	</div>
  	<div class="col-sm-4"></div>
  </div>
	   </div>
    </div>
  </div>
</header>

</body>
</html>
<?php include '../atribut/foot.php'; ?>