<?php
 
// menghubungkan dengan koneksi database
include 'koneksi.php';
 
// mengambil data 
$data_pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
$data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
$data_transaksi = mysqli_query($koneksi,"SELECT * FROM pembelian");
 
// menghitung data 
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
$jumlah_produk = mysqli_num_rows($data_produk);
$jumlah_transaksi = mysqli_num_rows($data_transaksi);
?>
<div class="row" style="width: 50%; margin-left: 25%; margin-top: 6%;">
  <div class="col-sm-6" style="padding-bottom:40px;">
    <div class="card" style="background-color: #FEDFDF;">
      <div class="card-body">
        <a href="navbar.php?halaman=pelanggan" class="btn">
          <img src="assets/icon/customer.png" alt="pelanggan" style="width: 50px; height: 50px;"></a>
        <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0%; color: #99888C;"><b>Pelanggan</b></h5>
        <p class="card-text" style="color: #3F0212;"><b>Jumlah pelanggan : <?php echo $jumlah_pelanggan; ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="background-color: #FEDFDF;">
      <div class="card-body">
        <a href="navbar.php?halaman=produk" class="btn">
          <img src="assets/icon/boxes.png" alt="pelanggan" style="width: 50px; height: 50px;"></a>
        <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0%; color: #99888C;"><b>Produk</b></h5>
        <p class="card-text" style="color: #3F0212;"><b>Jumlah Produk : <?php echo $jumlah_produk; ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="background-color: #FEDFDF;">
      <div class="card-body">
        <a href="navbar.php?halaman=pembelian" class="btn">
          <img src="assets/icon/shopping-cart.png" alt="pelanggan" style="width: 50px; height: 50px;"></a>
        <h5 class="card-title" style="margin-top: 10px; margin-bottom: 0%; color: #99888C;"><b>Transaksi</b></h5>
        <p class="card-text" style="color: #3F0212;"><b>Jumlah Transaksi : <?php echo $jumlah_transaksi; ?></b></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card" style="background-color: #FEDFDF;">
      <div class="card-body">
        <a href="navbar.php?halaman=laporan_pembelian" class="btn">
          <img src="assets/icon/business-report.png" alt="pelanggan" style="width: 50px; height: 50px;"></a>
        <h5 class="card-title" style="margin-top: 10px; padding-bottom: 36px; color: #99888C;"><b>Laporan</b></h5>
      </div>
    </div>
  </div>
</div>