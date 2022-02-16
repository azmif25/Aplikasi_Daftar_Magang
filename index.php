<?php

session_start();

include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {

	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	$query	=	"SELECT a.password,a.role_user as role,a.id as id_akun, b.id as id_daftar from akun a, pendaftaran b 
				WHERE email='$email' 
				AND b.id = a.id_user";

	$exec 	= mysqli_query($conn, $query);

	if ($exec) {

		if (mysqli_num_rows($exec) > 0) {
			while ($rows = mysqli_fetch_array($exec)) {

				if (password_verify($password, $rows['password'])) {
					$_SESSION['role_user'] 	= $rows['role'];
					$_SESSION['auth']		= $rows['id_daftar'];


					echo '<script> window.location="dashboard/index.php"; </script> ';
				} else {
					echo 'Password Salah!';
				}
			}
		} else {

			$query	=	"SELECT password,role_user,id from akun 
				WHERE email='$email'";

			$exec 	= mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					while ($rows = mysqli_fetch_array($exec)) {

						if (password_verify($password, $rows['password'])) {
							$_SESSION['role_user'] 	= $rows['role_user'];
							$_SESSION['auth']		= $rows['id'];

							echo '<script> window.location="dashboard/index.php"; </script> ';
						} else {
							echo 'Password Salah!';
						}
					}
				} else {
					echo 'Tidak ada user terdaftar';
				}
			} else {

				$exec 	= mysqli_query($conn, $query);
			}
		}
	} else {

		echo mysqli_error($conn);
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>HOME | SIPM</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
	<!--     Fonts and icons     -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="assets/css/main.css"> -->
	<link rel="stylesheet" href="style.css">

</head>

<body style="padding-top: 5%;">
	<!-- <div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="card-background">

					<div class="col-md-6 col-lg-5 col-sm-12 student">
						<center>
							<a href="login.php">
								<img src="assets/img/student.png" alt="Login">
								<h3>Login</h3>
							</a>
						</center>
					</div>

					<div class="col-md-6 col-lg-5 col-sm-12 note">
						<center>
							<a href="daftar_akun.php">
								<img src="assets/img/note.png" alt="Pendaftaran Siswa Baru">
								<h3>Daftar</h3>
							</a>
						</center>
					</div>

				</div>
			</div>
		</div>
	</div> -->

	<div class="form-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8">
					<div class="form-container">
						<div class="form-icon">
							<!-- <i class="fa fa-user-circle"></i> -->
							<img src="jjoin.png" alt="" style="max-width: 80%;"><br><br>
							<p style="font-size: 11pt; color: black; text-shadow: 2px 2px 5px #ff82de;">
								Silahkan lakukan pendaftaran terlebih dahulu jika anda belum memiliki akun. <br>
								Klik di bawah ini untuk mendaftar.</p>
							<span class="signup"><a href="daftar_akun.php" class="btn btn-primary"><b style="font-family: monospace;">Daftar</b></a></span>
						</div>
						<form class="form-horizontal" method="POST" action="">
							<h3 class="title"><img src="assets/img/logo.jpg" alt="" style="max-width: 90%;">Login Akun</h3>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-envelope"></i></span>
								<input class="form-control" type="email" name="email" placeholder="Email Address">
							</div>
							<div class="form-group">
								<span class="input-icon"><i class="fa fa-lock"></i></span>
								<input class="form-control" type="password" name="password" placeholder="Password">
							</div>
							<button class="btn signin" type="submit" name="submit"><b>Login</b></button>
							<!-- <span class="forgot-pass"><a href="#">Forgot Username/Password?</a></span> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>