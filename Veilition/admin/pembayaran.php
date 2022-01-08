<h2 style="color: #3F0212; padding-top:10px;"><b>Data Pembayaran</b></h2>
<hr style="margin-bottom:20px;">

<?php
// Mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];

// Mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

?>


<div class="row">
  <div class="col-md-6">
    <table class="table">
      <tr>
        <th>Bank</th>
        <td><?= $detail['bank']; ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td>Rp. <?= number_format($detail['jumlah']); ?>,-</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><?= $detail['tanggal']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <img src="../bukti_pembayaran/<?= $detail['bukti']; ?>" alt="" class="img-responsive">
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <form action="" method="post">
      <div class="form-group">
        <Label>No Resi Pengiriman</Label>
        <input type="text" class="form-control" name="resi" style="margin-top: 5px;">
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control" style="margin-top: 5px;">
          <option value="">Pilih Status</option>
          <option value="Lunas">Lunas</option>
          <option value="Barang Dikirim">Barang Dikirim</option>
          <option value="Batal">Batal</option>
        </select>
      </div>
      <button name="submit" class="btn btn-danger" style="margin-top: 20px; border-radius:10px">
				<a href="navbar.php?halaman=pembelian" style="color: white; text-decoration: none;">Batal</a></button>
      <button class="btn btn-success" name="proses" style="margin-top: 20px; margin-left: 10px; border-radius:10px">Proses</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['proses'])){
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

  echo "<script>alert('Data pembelian terupdate');</script>";
  echo "<script>location='navbar.php?halaman=pembelian';</script>";
}

?>




 