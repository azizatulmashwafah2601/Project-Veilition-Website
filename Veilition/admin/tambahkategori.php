<?php
$datakategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}
?>

<h2 style="color: #3F0212; padding-top:10px;"><b>Tambah Kategori</b></h2>
<hr style="margin-bottom:20px;">

<div class="row" id="modal">
	<div class="col-md-8">
		<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group" style="padding: 10px;">
					<label>Nama Kategori</label>
					<input type="text" name="nama" class="form-control">
				</div>
			<button name="" class="btn btn-danger" style="margin-top: 20px; margin-left: 10px; border-radius:10px">
				<a href="navbar.php?halaman=kategori" style="color: white; text-decoration: none;">Batal</a></button>
			<button name="submit" class="btn btn-primary" 
				style="margin-top: 20px; margin-left: 10px; border-radius:10px">Simpan</button>
		</form>
	</div>
</div>
<?php
    if(isset($_POST['submit'])){
        $result = $koneksi->query("INSERT INTO kategori VALUES('', '$_POST[nama]')");
        
        echo "<script>alert('Data berhasil ditambahkan');</script>";
        echo "<script>location='navbar.php?halaman=kategori';</script>";
    }
?>