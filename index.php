<?php  
session_start();

$error = "";

include 'koneksi/koneksi.php';

if (isset($_POST['login'])) {

	foreach ($_POST as $key => $value) {
		${$key} = $value;
	}

	$query = mysqli_query($conn, "SELECT password from dosen where nid='$nid'");

	if ($query) {

		if (mysqli_num_rows($query)>0) {
			
			$data  = mysqli_fetch_array($query);
			if (password_verify($password,$data['password'])) {
				$_SESSION['dosen'] = $nid;
				header("location:dosen");
				exit;
			}else $error = "Password dan Email Salah!";
		}else $error = "Password dan Email Salah!";
		
	}else $error = "Password dan Email Salah!";
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login DOSEN</title>
	<link rel="stylesheet" href="materialize/css/materialize.css">
	<link href="webcon/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
	<script src="js/jquery-2.2.2.js"></script>
	<script src="materialize/js/materialize.css"></script>
	<style>
		.log{
			margin-top:20px;
		}
		.h5{
			color: white;
			margin-left:-110px;
			margin-top: 100px; 
		}
	</style>
</head>
<body background="images/gedung-fikes.jpg">
<center><img src="images/logo.png" width="200" height="200" alt=""></center>
	<div class="container">
		<center><h5 class="h5">Sistem Absensi Kampus</h5></center>
		<div class="row log">
		    <div class="col s7 offset-s2 card-panel z-depth-3">
		    </div>

		    <div class="col s7 offset-s2 card-panel z-depth-3"><br>
		    	
		    		<a class="waves-effect waves-light btn blue darken-1 col s12" href="admin" style="margin-bottom:20px;"><i class="mdi mdi-forward left"></i>Login Admin</a>
					<a class="waves-effect waves-light btn blue darken-1 col s12" href="dosen" style="margin-bottom:20px;"><i class="mdi mdi-forward left"></i>Login Dosen</a>
		    		
            </div>
		</div>
	</div>
</body>
</html>
