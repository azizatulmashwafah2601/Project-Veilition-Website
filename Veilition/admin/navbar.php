<?php
	session_start();
	//koneksi ke database
	include 'koneksi.php';
	$admin  = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin");
	$row = mysqli_fetch_array($admin);

	if(!isset($_SESSION['admin'])){
		// echo "<script>location='login.php';</script>";
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Halaman Admin</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- MORRIS CHART STYLES-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- JQUERY SCRIPTS -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- TAMBAH STYLES CSS-->
	<link href="assets/style/styles.css" rel="stylesheet" />
</head>
<body style="background-color:#F4AEAE">
<style>
	@import url('https://fonts.googleapis.com/css2?family=Corinthia:wght@700&family=Poppins:wght@300&display=swap');
</style>
<!-- AWAL WRAPPER -->
<div id="wrapper">
	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" role="navigation" style="background-color: #F4AEAE;">
		<div class="container-fluid">
			<a class="navbar-brand" href="#" style="font-family:Corinthia; font-size: 50px; margin-left:65px;">
				<img src="assets/img/logo.png" alt="logo" width="100" height="76" style="margin-right:30px" 
				class="d-inline-block align-text-bottom">Veilition</a>
			<form class="d-flex">
				<button class="btn" type="button" style="color: #F4AEAE; 
					margin-right: 35px; background-color: white; border-radius:10px">
					<a href="navbar.php?halaman=logout" style="text-decoration: none; color: #F4AEAE;"><span>Logout
					<i class="fa fa-sign-out" style="margin-left:10px;"></i></span></a>
				</button>
			</form>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" aria-expanded="false">
			<span><i class="fa fa-align-justify" style="color: white;"></i></span>
		</button>
	</nav>
	<!-- AKHIR NAVBAR -->
	
	
	<!-- /. AWAL NAV SIDE  -->
	<nav class="navbar-default navbar-side" role="navigation">
		<div class="collapse sidebar-collapse" id="navbarNavDropdown">
			<ul class="nav flex-column">
				<li>
					</br>
					<a class="navbar-brand" href="#" style="margin-left: 30px;">
						<img src="../admin/assets/img/<?php echo $row['foto_admin']; ?>" width="40" style="margin-left: 65px; border-radius: 100%;">
					</a>
					<a class="nav-link" align="center">Selamat Datang <?php echo $row['nama_lengkap']; ?></a>
					<a class="nav-link" href="navbar.php?halaman=profil" align="center">Edit Profil<i class="fa fa-edit" 
						style="margin-left: 5px;"></i></a>
				</li>	
				<li>
					<a class="nav-link" href="navbar.php"><i class="fa fa-dashboard"></i>Home</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=produk" style="margin-right: 5px;"><i class="fa fa-cube"></i>Produk</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=kategori" style="margin-right: 5px;"><i class="fa fa-tags"></i>Kategori</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=pembelian" style="margin-right: 5px;"><i class="fa fa-shopping-cart"></i>Transaksi</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=laporan_pembelian" style="margin-right: 5px;"><i class="fa fa-file"></i>Laporan</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=pelanggan" style="margin-right: 5px;"><i class="fa fa-user"></i>Pelanggan</a>
				</li>
				<li>
					<a class="nav-link" href="navbar.php?halaman=logout" style="margin-right: 5px;"><i class="fa fa-sign-out"></i>Logout</a>
				</li>      
			</ul>
		</div>   
    </nav>
    <!-- /. AKHIR NAV SIDE  -->

    <!-- konten -->
    <div id="page-wrapper" >
			<div id="page-inner">
				<?php
					if(isset($_GET["halaman"])){
						if($_GET["halaman"] == "produk"){
							include 'produk.php';
						}
						elseif($_GET["halaman"] == "profil"){
							include 'profil.php';
						}
						elseif($_GET["halaman"] == "kategori"){
							include 'kategori.php';
						}
						elseif($_GET["halaman"] == "ubahkategori"){
							include 'ubahkategori.php';
						}
						elseif($_GET["halaman"] == "hapuskategori"){
							include 'hapuskategori.php';
						}
						elseif($_GET["halaman"] == "tambahkategori"){
							include 'tambahkategori.php';
						}
						elseif($_GET["halaman"] == "hapuspelanggan"){
							include 'hapuspelanggan.php';
						}
						elseif($_GET["halaman"] == "pembelian"){
							include 'pembelian.php';
						}
						elseif($_GET["halaman"] == "cetak"){
							include 'cetak.php';
						}
						elseif($_GET["halaman"] == "pelanggan"){
							include 'pelanggan.php';
						}
						elseif($_GET["halaman"] == "detail"){
							include 'detail.php';
						}
						elseif($_GET["halaman"] == "tambahproduk"){
							include 'tambahproduk.php';
						}
						elseif($_GET["halaman"] == "hapusproduk"){
							include 'hapusproduk.php';
						}
						elseif($_GET["halaman"] == "ubahproduk"){
							include 'ubahproduk.php';
						}
						elseif($_GET["halaman"] == "detailproduk"){
							include 'detailproduk.php';
						}
						elseif($_GET["halaman"] == "hapusfotoproduk"){
							include 'hapusfotoproduk.php';
						}
						elseif($_GET["halaman"] == "pembayaran"){
							include 'pembayaran.php';
						}
						elseif($_GET["halaman"] == "laporan_pembelian"){
							include 'laporan-pembelian.php';
						}
						elseif($_GET["halaman"] == "logout"){
							include 'logout.php';
						}
					}
					else{
						include 'home.php';
					}
				?>                        
			</div>
    </div>
    <!-- akhir konten -->
</div>
<!-- /. WRAPPER  -->

	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- MORRIS CHART SCRIPTS -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="assets/js/custom.js"></script>
    <footer class="text-center" style="color: white;">
		<p>&copy; Veilition 2021</p>
	</footer>
</body>
</html>
