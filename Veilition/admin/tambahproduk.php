<?php
$datakategori = [];
$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc()){
	$datakategori[] = $tiap;
}
?>


<h2 style="color: #3F0212; padding-top:10px;"><b>Tambah Produk</b></h2>
<hr style="margin-bottom:20px;">

<div class="row" id="modal">
	<div class="col-md-8">
		<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group" style="padding: 10px;">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control">
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Kategori</label>
					<select name="id_kategori" id="" class="form-control">
						<option value="">Pilih kategori</option>
						<?php foreach($datakategori as $key => $value): ?>
						<option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Harga (Rp)</label>
					<input type="number" name="harga" class="form-control">
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Berat (gr)</label>
					<input type="number" name="berat" class="form-control">
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Deskripsi</label>
					<textarea type="text" name="deskripsi" class="form-control" rows="6"></textarea>
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Foto</label>
					<div class="letak-input" style="margin-bottom: 5px;">
						<input type="file" name="foto[]" class="form-control">
					</div>
				</div>
				<div class="form-group" style="padding: 10px;">
					<label>Stok</label>
					<input type="number" name="stok" class="form-control">
				</div>
			<button name="" class="btn btn-danger" style="margin-top: 20px; margin-left: 10px; border-radius:10px">
				<a href="navbar.php?halaman=produk" style="color: white; text-decoration: none;">Batal</a></button>
			<button name="submit" class="btn btn-primary" 
				style="margin-top: 20px; margin-left: 10px; border-radius:10px">Simpan</button>
		</form>
	</div>
</div>

<?php  
if(isset($_POST["submit"])){
	
	$namanamafoto = $_FILES["foto"]["name"];
	$lokasilokasifoto = $_FILES["foto"]["tmp_name"];
	move_uploaded_file($lokasilokasifoto[0], "../foto_produk/".$namanamafoto[0]);

	// menyimpan ke database
	$result = $koneksi->query("INSERT INTO produk VALUES('', '$_POST[id_kategori]', '$_POST[nama]', '$_POST[harga]', '$_POST[berat]', '$namanamafoto[0]', '$_POST[deskripsi]', '$_POST[stok]')");

		echo "<script>alert('Data berhasil ditambahkan');</script>";
  		echo "<script>location='navbar.php?halaman=produk';</script>";
}
?>



















 