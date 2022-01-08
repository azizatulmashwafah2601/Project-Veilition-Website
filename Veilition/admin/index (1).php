<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<?php
if(isset($_POST['login'])){
	$ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
	$yangcocok = $ambil->num_rows;

	if($yangcocok == 1){
		$_SESSION['admin'] = $ambil->fetch_assoc();
		echo "<div class='alert alert-info'>Login sukses</div>";
		echo "<meta http-equiv='refresh' content='1;url=navbar.php'>";
	}
	else{
		echo "<div class='alert alert-danger'>Login gagal!</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Admin</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- TAMBAH STYLES CSS-->
	<link href="assets/style/style_login.css" rel="stylesheet"/>
</head>
<body>
	<img class="gambar" src="assets/img/gamis_login.png" alt="gamis">
	<div id="card">
        <div id="card-content">
            <div id="card-title">
				<img class="logo" src="assets/img/logo.png" alt="logo">
                <h2>Veilition Collection</h2>
        	</div>
    	</div>
    <div>
        <form class="form" action="" method="post">
			<div class="input-div one">
					<div class="i">
						<i class="fa fa-user"></i>
					</div>
					<div>
						<h5>Username</h5>
						<input class="input" name="user" type="text" placeholder="Username">
					</div>
				</div>
				<div class="input-div two">
					<div class="i">
						<i class="fa fa-lock"></i>
					</div>
					<div>
						<h5>Password</h5>
						<input class="input" name="pass" id="pass" type="password" placeholder="Password">
					</div>
				</div>
				<div class="checkbox-div">
					<input type="checkbox" style="background-color: #FB0445;" onclick="change()">
					<label style="color: #FB0445; margin-left:10px;">Show Password</label>
				</div>
				<input type="submit" name="login" class="btn" value="Login" style="margin-top: 30px;">
        </form>
    </div>
	</div>
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
	<script>
		function change() {
			var x = document.getElementById('pass').type;
            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
            } else {
               document.getElementById('pass').type = 'password';
            }
        }
	</script>
</body>
</html>