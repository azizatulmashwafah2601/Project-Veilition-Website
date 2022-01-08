<?php
  $tgl_mulai = "-";
  $tgl_selesai = "-";
  if(isset($_POST['kirim'])){
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];
}
?>

<h2 style="color: #3F0212; padding-top:10px;"><b>Laporan Transaksi</b></h2>
<hr style="margin-bottom:20px;">

<form action="cetak.php" method="post" style="margin-bottom: 15px;">
  <p style="padding-top:5px;"><b>Pilih Data Transaksi untuk Dicetak</b></p>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Tanggal Mulai</label>
        <input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="">Tanggal Selesai</label>
        <input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai; ?>">
      </div>
    </div>
    <div class="col-md-2">
      <label for="">&nbsp;</label><br>
      <button class="btn btn-primary" name="kirim" style="border-radius:10px;"><i class="fa fa-print" style="margin-right: 5px;"></i>Cetak</button>
    </div>
  </div>
</form>

<table class="table table-bordered">
  <thead>
    <tr style="background-color: #F4AEAE; color: white;" align="center">
      <th>No</th>
      <th>Pelanggan</th>
      <th>Tanggal</th>
      <th>Alamat</th>
      <th>Status</th>
      <th>Jumlah</th>
    </tr>
  </thead>
  <tbody>
    <?php 
			include 'koneksi.php';
			$batas = 5;
			$halaman = isset($_GET['page'])?(int)$_GET['page'] : 1;
			$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
      
			$ambil = mysqli_query($koneksi,"SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan");
			$jumlah_data = mysqli_num_rows($ambil);
			$total_halaman = ceil($jumlah_data / $batas);
	
			$data_transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan LIMIT $halaman_awal, $batas");
			$no = $halaman_awal+1;
			while($pecah = mysqli_fetch_array($data_transaksi)){
		?>
    <?php
      // include 'koneksi.php';
      // $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan");
      // $no=1;
      // while($pecah = $ambil->fetch_assoc()){
    ?>
    <tr>
      <td><?= $no++; ?>.</td>
      <td><?= $pecah['nama_pelanggan']; ?></td>
      <td><?= $pecah['alamat_pelanggan']; ?></td>
      <td><?= $pecah['tanggal_pembelian']; ?></td>
      <td><?= $pecah['status_pembelian']; ?></td>
      <td>Rp. <?= number_format($pecah['total_pembelian']); ?>,-</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  <nav aria-label="Page navigation example">
		<ul class="pagination" style="justify-content: right;">
			<!-- Awal Tombol sebelumnya -->
			<?php if ($halaman <= 1) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=laporan_pembelian&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=laporan_pembelian&page=<?php echo $halaman - 1; ?>">Previous</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol sebelumnya -->

			<?php 
			for($x=1;$x<=$total_halaman;$x++){
				?> 
				<li class="page-item"><a class="page-link" href="navbar.php?halaman=laporan_pembelian&page=<?php echo $x ?>"><?php echo $x; ?></a></li>
				<?php
			}
			?>	

			<!-- Awal Tombol Sesudah -->
			<?php if ($halaman >= $total_halaman) { ?>
				<li class="page-item disabled">
					<a class="page-link" href="navbar.php?halaman=laporan_pembelian&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } else { ?>
				<li class="page-item">
					<a class="page-link" href="navbar.php?halaman=laporan_pembelian&page=<?php echo $halaman + 1; ?>">Next</a>
				</li>
			<?php } ?>
			<!-- Akhir Tombol Sesudah -->
		</ul>
	</nav>