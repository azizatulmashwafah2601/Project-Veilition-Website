<h2 style="color: #3F0212; padding-top:10px;"><b>Data Kategori</b></h2>
<hr style="margin-bottom:20px;">

<table class="table table-bordered">
  <thead>
    <tr style="background-color: #F4AEAE; color: white;" align="center">
      <th>No</th>
      <th>Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    include 'koneksi.php';
		$batas = 5;
		$halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
				
		$ambil = mysqli_query($koneksi,"SELECT * FROM kategori");
		$jumlah_data = mysqli_num_rows($ambil);
		$total_halaman = ceil($jumlah_data / $batas);
 
		$data_kategori = mysqli_query($koneksi,"SELECT * FROM kategori LIMIT $halaman_awal, $batas");
		$no = $halaman_awal+1;
		while($pecah = mysqli_fetch_array($data_kategori)){
	?>
    <tr>
      <td><?= $no++; ?>.</td>
      <td><?= $pecah['nama_kategori']; ?></td>
      <td>
        <a href="navbar.php?halaman=ubahkategori&id=<?= $pecah['id_kategori']; ?>" class="btn btn-warning btn-xs" style="color: white; border-radius:10px">Ubah</a> | 
        <a href="navbar.php?halaman=hapuskategori&id=<?= $pecah['id_kategori']; ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs" 
          style="border-radius:10px">Hapus</a>
      </td>
    </tr>
		<?php } ?>
  </tbody>
</table>
	<?php
		// mengambil data 
		$data_kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
		// menghitung data
		$jumlah_kategori = mysqli_num_rows($data_kategori);
	?>
	<p><b>Jumlah Data Kategori : <?php echo $jumlah_kategori; ?></b></p>

  	<nav aria-label="Page navigation example">
		<ul class="pagination" style="justify-content: right;">
			<!-- Awal Tombol sebelumnya -->
			<?php if ($halaman <= 1) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=kategori&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=kategori&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol sebelumnya -->

			<?php 
			for($x=1;$x<=$total_halaman;$x++){
				?> 
				<li class="page-item"><a class="page-link" href="navbar.php?halaman=kategori&page=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php	}	?>	

			<!-- Awal Tombol Sesudah -->
			<?php if ($halaman >= $total_halaman) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=kategori&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=kategori&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol Sesudah -->
		</ul>
	</nav>

<a href="navbar.php?halaman=tambahkategori" class="btn btn-primary" style="margin-top: 20px; border-radius:10px">Tambah Data</a>
<input type="submit" class="btn btn-success" value="Refresh" style="margin-top: 20px; border-radius:10px; margin-left: 10px;" onClick="document.location.reload(true)">






