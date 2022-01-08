<h2 style="color: #3F0212; padding-top:10px;"><b>Data Transaksi Pembelian</b></h2>
<hr style="margin-bottom:20px;">

<table class="table table-bordered">
	<thead>
		<tr style="background-color: #F4AEAE; color: white;" align="center">
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th>Tanggal Pembelian</th>
		<th>Status Pembelian</th>
		<th>Total</th>
		<th>Aksi</th>
		</tr> 
	</thead>
	<tbody>
		<?php 
			include 'koneksi.php';
			$batas = 5;
			$halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
			$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

			$ambil = mysqli_query($koneksi,"SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
			$jumlah_data = mysqli_num_rows($ambil);
			$total_halaman = ceil($jumlah_data / $batas);
	
			$data_transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan LIMIT $halaman_awal, $batas");
			$no = $halaman_awal+1;
			while($pecah = mysqli_fetch_array($data_transaksi)){
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $pecah["nama_pelanggan"]; ?></td>
			<td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
			<td><?= $pecah["status_pembelian"]; ?></td>
			<td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
			<td>
				<a href="navbar.php?halaman=detail&id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-primary btn-xs" style="border-radius:10px">Detail</a> | 
				<?php if($pecah['status_pembelian'] != 'pending'): ?>
					<a href="navbar.php?halaman=pembayaran&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success btn-xs" style="border-radius:10px">Pembayaran</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php } ?>

	</tbody>
</table>
	<?php
		// mengambil data 
		$data_pembelian = mysqli_query($koneksi,"SELECT * FROM pembelian");
		// menghitung data
		$jumlah_pembelian = mysqli_num_rows($data_pembelian);
	?>
	<p><b>Jumlah Data Transaksi : <?php echo $jumlah_pembelian; ?></b></p>

	<nav aria-label="Page navigation example">
		<ul class="pagination" style="justify-content: right;">
			<!-- Awal Tombol sebelumnya -->
			<?php if ($halaman <= 1) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=pembelian&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=pembelian&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol sebelumnya -->

			<?php 
			for($x=1;$x<=$total_halaman;$x++){
				?> 
				<li class="page-item"><a class="page-link" href="navbar.php?halaman=pembelian&page=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
			}
			?>
			
			<!-- Awal Tombol Sesudah -->
			<?php if ($halaman >= $total_halaman) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=pembelian&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=pembelian&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol Sesudah -->
		</ul>
	</nav>
	<input type="submit" class="btn btn-success" value="Refresh" style="margin-top: 20px; border-radius:10px;" onClick="document.location.reload(true)">