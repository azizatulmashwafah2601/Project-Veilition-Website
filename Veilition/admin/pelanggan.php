<h2 style="color: #3F0212; padding-top:10px;"><b>Data Pelanggan</b></h2>
<hr style="margin-bottom:20px;">
<form action="navbar.php?halaman=pelanggan" method="POST" class="d-flex" style="margin-left:70%; margin-bottom: 20px;">
	<input class="form-control me-2" type="text" style="background-color: white; border-radius:10px; 
		border-color: #3F0212; border-width: 2px;" name="keyword" type="search" placeholder="Cari Akun" aria-label="Search">
	<button class="btn" style="color: #3F0212;" name="btn-cari">
		<span><i class="fa fa-search" style="margin-right: 5px; border-radius:10px"></i></span>
	</button>
</form>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #F4AEAE; color: white;" align="center">
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Alamat</th>
		<th>Aksi</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			include 'koneksi.php';
			$batas = 5;
			$banyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan"));
			$banyakHal = ceil($banyakData / $batas); 
			if (isset($_GET['page'])) {
				$halamanAktif = $_GET['page'];
			} else {
				$halamanAktif = 1;
			}
			$dataAwal = ($halamanAktif * $batas) - $batas;
			$no=1+$dataAwal;
			$ambil = mysqli_query($koneksi, "SELECT * FROM pelanggan LIMIT $dataAwal, $batas");
			
			//Fitur Search
			if (isset($_POST['btn-cari'])) {
				$keyword = $_POST['keyword'];
				$ambil = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE nama_pelanggan LIKE '%$keyword%' LIMIT $dataAwal, $batas");
			} else {
				$ambil = mysqli_query($koneksi, "SELECT * FROM pelanggan LIMIT $dataAwal, $batas");
			}
			while($pecah = mysqli_fetch_array($ambil)){
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $pecah["nama_pelanggan"]; ?></td>
			<td><?= $pecah["email_pelanggan"]; ?></td>
			<td><?= $pecah["telepon_pelanggan"]; ?></td>
			<td><?= $pecah["alamat_pelanggan"]; ?></td>
			<td>
				<a href="navbar.php?halaman=hapuspelanggan&id=<?= $pecah['id_pelanggan']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs" style="border-radius:10px">Hapus</a>
			</td>
		</tr>
		<?php } ?>

	</tbody>
</table>
	<?php
		// mengambil data 
		$data_pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
		// menghitung data
		$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
	?>
	<p><b>Jumlah Data pelanggan : <?php echo $jumlah_pelanggan; ?></b></p>

	<nav aria-label="Page navigation example">
		<ul class="pagination" style="justify-content: right;">
			<!-- Awal Tombol sebelumnya -->
			<?php if ($halamanAktif <= 1) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=pelanggan&page=<?php echo $halamanAktif - 1; ?>">Previous</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=pelanggan&page=<?php echo $halamanAktif - 1; ?>">Previous</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol sebelumnya -->

			<?php
				for ($i=1; $i <= $banyakHal; $i++) { 
			?>
			<li class="page-item">
				<a class="page-link" href="navbar.php?halaman=pelanggan&page=<?php echo $i ?>"><?php echo $i; ?></a>
			</li>
			<?php } ?>

			<!-- Awal Tombol Sesudah -->
			<?php if ($halamanAktif >= $banyakHal) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=pelanggan&page=<?php echo $halamanAktif + 1; ?>">Next</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=pelanggan&page=<?php echo $halamanAktif + 1; ?>">Next</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol Sesudah -->
			
		</ul>
	</nav>
	<input type="submit" class="btn btn-success" value="Refresh" style="margin-top: 20px; border-radius:10px" onClick="document.location.reload(true)">