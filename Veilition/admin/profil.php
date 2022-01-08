<?php
  include 'koneksi.php';
  $admin  = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin");
  $row = mysqli_fetch_array($admin);

  if(isset($_POST['ubah'])){
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
  
    // jika foto dirubah
    if(!empty($lokasifoto)){
      move_uploaded_file($lokasifoto, "../admin/assets/img/$namafoto");
  
      $koneksi->query("UPDATE admin SET id_admin='$_POST[id_admin]', username='$_POST[username]', password='$_POST[password]', nama_lengkap='$_POST[nama_lengkap]', foto_admin='$namafoto' WHERE id_admin");
    }
    else{
      $koneksi->query("UPDATE admin SET id_admin='$_POST[id_admin]', username='$_POST[username]', password='$_POST[password]', nama_lengkap='$_POST[nama_lengkap]' WHERE id_admin");
    }
  
    echo "<script>alert('Profil berhasil diubah');</script>";
    echo "<script>location='navbar.php?halaman=profil';</script>";
  }
?>

  <h2 style="color: #3F0212; padding-top:10px;"><b>Edit Profil</b></h2>
  <hr style="margin-bottom:20px;">
  
  <div class="row">
      <div class="col-md-8">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $row['id_admin']; ?>" name="id_admin" class="form-control">
        <div class="form-group" style="padding: 10px;">
          <label for="">Username</label>
          <input type="text" class="form-control" value="<?php echo $row['username']; ?>" name="username">
        </div>
        <div class="form-group" style="padding: 10px;">
          <label for="">Password</label>
          <input type="text" class="form-control" value="<?php echo $row['password']; ?>" name="password">
        </div>
        <div class="form-group" style="padding: 10px;">
          <label for="">Nama Lengkap</label>
          <input type="text" class="form-control" value="<?php echo $row['nama_lengkap']; ?>" name="nama_lengkap">
        </div>
        <div class="form-group" style="padding: 10px;">
          <label for="">Foto Profil</label><br>
          <img src="../admin/assets/img/<?php echo $row['foto_admin']; ?>" width="200">
        </div>
        <div class="form-group" style="padding: 10px;">
          <label for="">Ganti Foto</label>
          <input type="file" name="foto" class="form-control">
        </div>
        <button name="submit" class="btn btn-danger" style="margin-top: 20px; margin-left: 10px; border-radius:10px">
                  <a href="navbar.php" style="color: white; text-decoration: none;">Batal</a></button>
        <button name="ubah" class="btn btn-primary" style="margin-top: 20px; margin-left: 10px; border-radius:10px">Ubah</button>
      </form>
    </div>
  </div>