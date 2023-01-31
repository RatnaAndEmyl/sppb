<?php
include '..\..\koneksi.php';
$kode_bbk                = $_POST['kode_bbk'];
$tgl_create              = $_POST['tgl_create'];
$jumlah_pemenuhan        = $_POST['jumlah_pemenuhan'];

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_permintaan_detail WHERE tgl_create='$tgl_create'");
$tampil = $sql->fetch_assoc();

$kode_barang            = $tampil['kode_barang'];
$kode_permintaan        = $tampil['kode_permintaan'];
$nama_barang            = $tampil['nama_barang'];
$jumlah_permintaan      = $tampil['jumlah_permintaan'];
$kode_satuan            = $tampil['kode_satuan'];
$nama_satuan            = $tampil['nama_satuan'];

// echo $kode_barang . '<br>';
// echo $kode_permintaan . '<br>';
// echo $nama_barang . '<br>';
// echo $jumlah_permintaan . '<br>';
// echo 'permintaan '.$jumlah_permintaan . '<br>';
// echo 'pemenuhan '.$jumlah_pemenuhan . '<br>';
// echo $kode_satuan . '<br>';
// echo $nama_satuan . '<br>';


$simpan                 = $_POST['simpan'];

if ($simpan) {
  $sql_tampil_jumlahpemenuhan = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', kode_permintaan, kode_barang FROM pb_transaksi.tb_bbk_detail WHERE kode_permintaan='$kode_permintaan' AND kode_barang='$kode_barang' AND kode_bbk='$kode_bbk'");
  $tampil_jumlahpemenuhan = $sql_tampil_jumlahpemenuhan->fetch_assoc();

  $kode_permintaan_new  = $tampil_jumlahpemenuhan['kode_permintaan'];
  $kode_barang_new      = $tampil_jumlahpemenuhan['kode_barang'];
  $jumlah_pemenuhan_new = $tampil_jumlahpemenuhan['jumlah'] + $jumlah_pemenuhan;
  // echo $jumlah_permintaan_new . '<br>';
  // echo $kode_barang_new . '<br>';

  if (($kode_permintaan_new == $kode_permintaan) and ($kode_barang_new == $kode_barang)) {
    $sqltext = "UPDATE pb_transaksi.tb_bbk_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', update_by='$kode_user' where kode_permintaan='$kode_permintaan' AND kode_barang='$kode_barang' AND kode_bbk='$kode_bbk'";
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_bbk_detail values('$kode_bbk','$kode_permintaan','$kode_barang','$nama_barang','$jumlah_permintaan','$jumlah_pemenuhan','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
  }

  $sql = $koneksi_master->query($sqltext);  //*perulangannya
  // echo $sqltext. '<br>';

  if ($sql) { ?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
    </script>

  <?php } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
    </script>
<?php
  }
}

// punya histori stok

$sql_tampil_stok_new = $koneksi_master->query("SELECT DISTINCT a.pemohon, b.nama, a.kode_gudang FROM pb_transaksi.tb_bbk a INNER JOIN pb_role.tb_user b ON a.create_by=b.kode_user WHERE kode_bbk='$kode_bbk' AND a.status='A' AND b.status='A'");
$tampil_stok_new = $sql_tampil_stok_new->fetch_assoc();
$pemohon_new         = $tampil_stok_new['pemohon'];
$nama_new            = $tampil_stok_new['nama'];
$kode_gudang_new     = $tampil_stok_new['kode_gudang'];


$sql_tampil_tglcreate_terakhir = $koneksi_master->query("SELECT tgl_create, stok_awal, stok_akhir  FROM pb_transaksi.tb_history_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new' AND status='A' ORDER BY tgl_create DESC");
$tampil_tglcreate_terakhir = $sql_tampil_tglcreate_terakhir->fetch_assoc();

$tgl_terakhir_new = $tampil_tglcreate_terakhir['tgl_create'];
$stok_awal_new = $tampil_tglcreate_terakhir['stok_awal'];
$stok_akhir_new = $tampil_tglcreate_terakhir['stok_akhir'];

if (($stok_awal_new == '') or ($stok_akhir_new == '')) {
  $stok_awal_new = 0;
  $stok_akhir_new = 0;
}

$stok_akhir_stok = $stok_akhir_new - $jumlah_pemenuhan;

// echo 'Tanggal Terakhir = ' . $tgl_terakhir_new . '<br>';
// echo 'Stok Awal = ' . $stok_awal_new . '<br>';
// echo 'Stok Terakhir = ' . $stok_akhir_new . '<br>';
// echo 'Stok Akhir Banget = ' . $stok_akhir_stok . '<br>';


$sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_permintaan','$kode_gudang_new','$kode_barang','$nama_barang','$nama_new','$pemohon_new','BBK','$stok_akhir_new','$stok_masuk','$jumlah_pemenuhan','$stok_akhir_stok','A',null,'$kode_user',null,null,null,null)";

$sql_history_stok = $koneksi_master->query($sql_history);  //*perulangannya
// echo $sql_history. '<br>';


// punya stok
$sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'");
$tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

$kode_barangstok_new     = $tampil_jumlah_stok['kode_barang'];
$kode_gudangstok_new     = $tampil_jumlah_stok['kode_gudang'];
$stok                    = $tampil_jumlah_stok['jumlah_stok'];
$stok_new                = $tampil_jumlah_stok['jumlah_stok'] - $jumlah_pemenuhan;

// echo 'Jumlah Stok= '. $stok. '<br>';
// echo 'Jumlah Pemenuhan= '. $jumlah_pemenuhan. '<br>';
// echo 'Jumlah Stok Setelah Dikurang= '. $stok_new. '<br>';

// echo  'Stok='. $stok_new. '<br>';
// echo  'Kode Gudang Baru='. $kode_barangstok_new. '<br>';
// echo  'Kode Barang Baru='. $kode_gudangstok_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// echo  'Jumlah Pemenuhan='. $jumlah_pemenuhan. '<br>' . '<br>';
// echo  'Kode Barang Baru1='. $kode_barang_new. '<br>' . '<br>';


if (($kode_barangstok_new == $kode_barang) and ($kode_gudangstok_new == $kode_gudang_new)) {
  $sql_stok = "UPDATE pb_transaksi.tb_stok SET onhandstok='$stok_new', update_by='$kode_user' where kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'";
  // untuk mengupdate jumlah pemenuhan jika kode po dan kode barang udah ada 
}

$tampil_sql_stok = $koneksi_master->query($sql_stok);  //*perulangannya
// echo $sql_stok. '<br>' . '<br>';


// mengarah ke tabel barang dimaster
$sql_jumlah_stok_keseluruhan = $koneksi_master->query("SELECT SUM(onhandstok) 'stok_keseluruhan' FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND status='A'");
$jumlah_stok_keseluruhan = $sql_jumlah_stok_keseluruhan->fetch_assoc();

$onhandstok = $jumlah_stok_keseluruhan['stok_keseluruhan'];

// echo  'Stok = '. $stok_new. '<br>';
// echo  'Sum Jumlah Stok = '. $jumlah_stok_keseluruhan['jumlah_stok_keseluruhan']. '<br>';

$sql_stok_keseluruhan = "UPDATE pb_master.tb_barang SET onhandstok='$onhandstok', update_by='$kode_user' WHERE id_barang='$kode_barang'";
// untuk mengupdate onhandstok ditabel master jika kode barang sudah ada

$tampil_sql_stok_keseluruhan = $koneksi_master->query($sql_stok_keseluruhan);  //*perulangannya
// echo $sql_stok_keseluruhan . '<br>';

?>