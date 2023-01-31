<?php
include '..\..\koneksi.php';
$kode_adjustment         = $_POST['kode_adjustment'];
$kode_barang             = $_POST['kode_barang'];
$tgl_create              = $_POST['tgl_create'];
$value                   = $_POST['value'];
$stok_in                 = $_POST['stok_in'];
$stok_out                = $_POST['stok_out'];

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_barang a INNER JOIN pb_master.tb_satuan b ON a.kode_satuan=b.kode_satuan WHERE a.status='A' AND b.status='A' AND id_barang='$kode_barang'");
$tampil = $sql->fetch_assoc();

$nama_barang            = $tampil['nama_barang'];
$kode_satuan            = $tampil['kode_satuan'];
$nama_satuan            = $tampil['nama_satuan'];

$simpan                 = $_POST['simpan'];

if ($simpan) {

  if ($value == 'in') {
    $sqltext = "INSERT INTO pb_transaksi.tb_adjustment_detail values('$kode_adjustment','$kode_barang','$nama_barang','$stok_in',null,'$kode_satuan','$nama_satuan','A', null,'$value','A',null,'$kode_user',null,null,null,null)";
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_adjustment_detail values('$kode_adjustment','$kode_barang','$nama_barang',null,'$stok_out','$kode_satuan','$nama_satuan','A',null,'$value','A',null,'$kode_user',null,null,null,null)";
  }

  $sql = $koneksi_master->query($sqltext);  //*perulangannya
  // echo $sqltext. '<br>';

  if ($sql) { ?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>

  <?php } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>
<?php
  }
}

// // punya histori stok
// $sql_tampil_stok_new = $koneksi_master->query("SELECT DISTINCT a.username, a.kode_gudang FROM pb_transaksi.tb_adjustment a INNER JOIN pb_role.tb_user b ON a.create_by=b.kode_user WHERE kode_adjustment='$kode_adjustment' AND a.status='A' AND b.status='A'");
// $tampil_stok_new = $sql_tampil_stok_new->fetch_assoc();
// $username_new         = $tampil_stok_new['username'];
// $kode_gudang_new      = $tampil_stok_new['kode_gudang'];

// // echo $username_new . '<br>';
// // echo $kode_gudang_new . '<br>';
// // echo $stok_in . '<br>';
// // echo $stok_out . '<br>';

// if ($value == 'in') {
//   $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new',null,'ADJ IN',null,'$stok_in','$stok_keluar',null,'A',null,'$kode_user',null,null,null,null)";
// } else {
//   $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new',null,'ADJ OUT',null,'$stok_masuk','$stok_out',null,'A',null,'$kode_user',null,null,null,null)";
// }

// // $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_adjustment','$kode_gudang_new','$kode_barang','$nama_barang','$username_new',null,'ADJ',null,'$stok_masuk','$jumlah_pemenuhan',null,'A',null,'$kode_user',null,null,null,null)";

// $sql_history_stok = $koneksi_master->query($sql_history);  //*perulangannya
// // echo $sql_history;


// // punya stok
// $sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'");
// $tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

// $kode_barangstok_new     = $tampil_jumlah_stok['kode_barang'];
// $kode_gudangstok_new     = $tampil_jumlah_stok['kode_gudang'];
// $stok                    = $tampil_jumlah_stok['jumlah_stok'];
// if ($value == 'in') {
//   $stok_new                = $tampil_jumlah_stok['jumlah_stok'] + $stok_in;
// } else if ($value == 'out') {
//   $stok_new                = $tampil_jumlah_stok['jumlah_stok'] - $stok_out;
// }

// // echo 'Jumlah Stok= '. $stok. '<br>';
// // echo 'Jumlah Stok Setelah Dikurang= '. $stok_new. '<br>';
// // echo 'Jumlah Pemenuhan= '. $jumlah_pemenuhan. '<br>';

// // echo  'Stok='. $stok_new. '<br>';
// // echo  'Kode Gudang Baru='. $kode_barangstok_new. '<br>';
// // echo  'Kode Barang Baru='. $kode_gudangstok_new. '<br>';
// // echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// // echo  'Kode Gudang='. $kode_gudang_new. '<br>';


// if (($kode_barangstok_new == $kode_barang) and ($kode_gudangstok_new == $kode_gudang_new)) {
//   $sql_stok = "UPDATE pb_transaksi.tb_stok SET onhandstok='$stok_new', update_by='$kode_user' where kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'";
//   // untuk mengupdate jumlah pemenuhan jika kode po dan kode barang udah ada 
// } else {
//   if ($value == 'in') {
//     $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$stok_in','A',null,'$kode_user',null,null,null,null)";
//   } elseif ($value == 'in') {
//     $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$stok_out','A',null,'$kode_user',null,null,null,null)";
//   }
// }

// $tampil_sql_stok = $koneksi_master->query($sql_stok);  //*perulangannya
// // echo $sql_stok . '<br>' . '<br>';


// // mengarah ke tabel barang dimaster
// $sql_jumlah_stok_keseluruhan = $koneksi_master->query("SELECT SUM(onhandstok) 'stok_keseluruhan' FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND status='A'");
// $jumlah_stok_keseluruhan = $sql_jumlah_stok_keseluruhan->fetch_assoc();

// $onhandstok = $jumlah_stok_keseluruhan['stok_keseluruhan'];

// // echo  'Stok = '. $stok_new. '<br>';
// // echo  'Sum Jumlah Stok = '. $jumlah_stok_keseluruhan['jumlah_stok_keseluruhan']. '<br>';

// $sql_stok_keseluruhan = "UPDATE pb_master.tb_barang SET onhandstok='$onhandstok', update_by='$kode_user' WHERE id_barang='$kode_barang'";
// // untuk mengupdate onhandstok ditabel master jika kode barang sudah ada

// $tampil_sql_stok_keseluruhan = $koneksi_master->query($sql_stok_keseluruhan);  //*perulangannya
// // echo $sql_stok_keseluruhan . '<br>';

?>