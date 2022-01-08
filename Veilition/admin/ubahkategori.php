<?php
  $ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$_GET[id]'");
  $pecah = $ambil->fetch_assoc();

  if(isset($_POST['ubah'])){
    $namakategori = $_POST['txt_kategori'];
    
    $koneksi->query("UPDATE kategori SET nama_kategori='$namakategori' WHERE id_kategori='$_GET[id]'");
    
    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>location='navbar.php?halaman=kategori';</script>";
  }
?>

  <h2 style="color: #3F0212; padding-top:10px;"><b>Edit Profil</b></h2>
  <hr style="margin-bottom:20px;">
  
  <div class="row">
      <div class="col-md-8">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $pecah['id_kategori']; ?>" name="id_kategori" class="form-control">
        <div class="form-group" style="padding: 10px;">
          <label for="">Kategori</label>
          <input type="text" class="form-control" value="<?php echo $pecah['nama_kategori']; ?>" name="txt_kategori">
        </div>
        <button name="submit" class="btn btn-danger" style="margin-top: 20px; margin-left: 10px; border-radius:10px">
                  <a href="navbar.php?halaman=kategori" style="color: white; text-decoration: none;">Batal</a></button>
        <button name="ubah" class="btn btn-primary" style="margin-top: 20px; margin-left: 10px; border-radius:10px">Ubah</button>
      </form>
    </div>
  </div>