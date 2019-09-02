<?php  
	require '../atribut/fungsi.php';
	session_start();

/*	if (isset($_COOKIE['login'])) {
		if ($_COOKIE['login']=='true') {
			$_SESSION['login']=true;
		}
	}
*/
	if(isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		$result =mysqli_query($conn, "SELECT username FROM users WHERE id =$id");
		$row = mysqli_fetch_assoc($result);		

		if ($key === hash('sha256', $row['username'])) {
			$_SESSION['login']=true;
		}
	}

	if(isset($_SESSION["login"])){
		header("Location: ../html/datakost.php");
		exit;
	}

	if (isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result =mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

		if (mysqli_num_rows($result)===1) {
			$row = mysqli_fetch_assoc($result);

			if (password_verify($password , $row["password"])) {
				session_start();
				$_SESSION["login"]= true;

				//cek remember me
				if (isset($_POST['remember'])) {
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash(sha256, $row['username']),time()+60);
				}

				header("Location:../html/datakost.php");
				exit;
			}
		}
		$error = true;
	}
?>
<?php include '../atribut/head.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	        <h2 class="text-center">Log in User</h2>       

  	<?php if(isset($error)):?>
		<p style="color:red ; font-style: bold">
		Username dan Password salah</p>
	<?php endif ?>	        

	        <div class="form-group">
	            <input type="text" class="form-control" placeholder="Username" required="required" name="username" id="username"> 
	        </div>
	        <div class="form-group">
	            <input type="password" class="form-control" placeholder="Password" required="required" name="password" id="password">
	        </div>
	        <div class="clearfix">
	            <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" id="remember"> Remember me</label>
	        </div> <br>	        
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary btn-block" name="login">Log in</button>
	        </div>
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