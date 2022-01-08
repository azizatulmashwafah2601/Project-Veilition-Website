<?php
  define('DB_SERVER','localhost');
  define('DB_USER','u1694897_c_reg_1');
  define('DB_PASS' ,'jtipolije');
  define('DB_NAME', 'u1694897_c_reg_1_db');
  $koneksi = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  // Memanggil file fpdf yang anda tadi simpan di folder htdoc
  require('../fpdf/fpdf.php'); {
  date_default_timezone_set('Asia/Jakarta');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );
  }

  // Ukuran kertas PDF
  $pdf = new FPDF("L","cm","A4");

  $pdf->SetMargins(2,1,1);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Times','B',12);
  $pdf->ln(1);
  $pdf->SetFont('Times','B',12);
  //Format tanggal
  $pdf->Cell(8,0.7,"Printed On : ".date("l, d F Y"),0,0,'C');

  $pdf->ln(1);
  $pdf->SetFont('Times','B',14);
  // from dan edn ini adalah nama dari form star_filter.php yang berfungsi untuk memanggil tanggal yang di atur
  $tgl_mulai = $_POST['tglm'];
  $tgl_selesai = $_POST['tgls'];
  $query=mysqli_query($koneksi,"SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  $lihat=mysqli_fetch_array($query);
  $pdf->Cell(26.5, 2,"Laporan Transaksi Dari " . $tgl_mulai . " Hingga " . $tgl_selesai,0,10,'C');

  // st font yang ingin anda gunakan
  $pdf->SetFont('Times','B',10);
  // queri yang ingin di tampilkan di tabel sehingga ketika diubah tidak akan berpengaruh
  // Kode 1, 0, 'C' dan banyak kode di bawah adalah ukuran lebar tabel ubah jika tidak sesuai keinginan anda.
  $pdf->Cell(1, 1, 'No', 1, 0, 'C');
  $pdf->Cell(4.5, 1, 'Pelanggan', 1, 0, 'C');
  $pdf->Cell(6, 1, 'Alamat', 1, 0, 'C');
  $pdf->Cell(4, 1, 'Tanggal', 1, 0, 'C');
  $pdf->Cell(6, 1, 'Status', 1, 0, 'C');
  $pdf->Cell(4.5, 1, 'Jumlah', 1, 1, 'C');
  $pdf->SetFont('Arial','',10);
  
  
  // memanggil database
  $query=mysqli_query($koneksi,"SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
  while($lihat=mysqli_fetch_array($query)){
    $semuadata[] = $lihat;
  }
  $total=0;
  foreach($semuadata as $no => $value) {
  $total += $value['total_pembelian'];
  // st font yang ingin anda gunakan
  $pdf->SetFont('Times','',10);
  // Queri yang ingin ditampilkan yang berada di database
  $pdf->Cell(1, 1, $no+1, 1, 0, 'C');
  $pdf->Cell(4.5, 1, $value['nama_pelanggan'], 1, 0,'C');
  $pdf->Cell(6, 1, $value['alamat_pelanggan'], 1, 0,'C');
  $pdf->Cell(4, 1, $value['tanggal_pembelian'], 1, 0,'C');
  $pdf->Cell(6, 1, $value['status_pembelian'], 1, 0,'C');
  $pdf->Cell(4.5, 1, "Rp. " . $value['total_pembelian'], 1, 1, 'C');
  }

  //total harga
  $pdf->SetFont('Times','B',10);
  $pdf->Cell(1, 1, '', 0, 0, 'C');
  $pdf->Cell(4.5, 1, '', 0, 0, 'C');
  $pdf->Cell(6, 1, '', 0, 0, 'C');
  $pdf->Cell(4, 1, '', 0, 0, 'C');
  $pdf->Cell(6, 1, 'Total', 1, 0, 'C');
  $pdf->Cell(4.5, 1, "Rp. " . $total, 1, 1,'C');

  $pdf->ln(1);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(40.5, 0.7,"Disetujui Oleh, " ,0,10,'C');

  $pdf->ln(2);
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(40.5,0.7,"Owner Veilition Collection",0,10,'C');
  // Nama file ketika di print
  $pdf->Output("cetak.pdf","I");
?>