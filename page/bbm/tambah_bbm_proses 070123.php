<?php
include '..\..\koneksi.php';
$kode_bbm                = $_POST['kode_bbm'];
$tgl_create              = $_POST['tgl_create'];
$jumlah_pemenuhan       = $_POST['jumlah_pemenuhan'];

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_po_detail WHERE tgl_create='$tgl_create'");
$tampil = $sql->fetch_assoc();

$kode_barang            = $tampil['kode_barang'];
$kode_po                = $tampil['kode_po'];
$nama_barang            = $tampil['nama_barang'];
$jumlah_pemenuhan_po    = $tampil['jumlah_pemenuhan'];
$kode_satuan            = $tampil['kode_satuan'];
$nama_satuan            = $tampil['nama_satuan'];


// echo $kode_barang . '<br>';
// echo $nama_barang . '<br>';
// echo $jumlah_permintaan . '<br>';
// echo 'permintaan '.$jumlah_permintaan . '<br>';
// echo 'pemenuhan= '.$jumlah_pemenuhan_po . '<br>';
// echo $kode_satuan . '<br>';
// echo $nama_satuan . '<br>';

$simpan                 = $_POST['simpan'];

if ($simpan) {

  $sql_tampil_jumlah_pemenuhan_bbm = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', kode_po, kode_barang FROM pb_transaksi.tb_bbm_detail WHERE kode_po='$kode_po' AND kode_barang='$kode_barang' AND kode_bbm='$kode_bbm' AND status='A'");
  $tampil_jumlah_pemenuhan_bbm = $sql_tampil_jumlah_pemenuhan_bbm->fetch_assoc();

  $kode_po_new          = $tampil_jumlah_pemenuhan_bbm['kode_po'];
  $kode_barang_new      = $tampil_jumlah_pemenuhan_bbm['kode_barang'];
  $jumlah_pemenuhan_new = $tampil_jumlah_pemenuhan_bbm['jumlah'] + $jumlah_pemenuhan;
  // echo $tgl_create_new. '<br>';


  if (($kode_po_new == $kode_po) and ($kode_barang_new == $kode_barang)) {
    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', update_by='$kode_user' where kode_po='$kode_po' AND kode_barang='$kode_barang' AND kode_bbm='$kode_bbm'";
    // untuk mengupdate jumlah pemenuhan jika kode po dan kode barang udah ada
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_bbm_detail values('$kode_bbm','$kode_po','$kode_barang','$nama_barang','$jumlah_pemenuhan_po','$jumlah_pemenuhan','$kode_satuan','$nama_satuan','A',null,'A',null,'$kode_user',null,null,null,null)";
  }

  // $sql = $koneksi_master->query($sqltext);
  echo $sqltext. '<br>';

  if ($sql) { ?>

    <script type="text/javascript">
      // alert("Data Berhasil Disimpan")
      // window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>

  <?php } else { ?>
    <script type="text/javascript">
      // alert("Data Gagal Disimpan");
      // window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>
<?php
  }
  

  // punya tabel histori stok
  $sql_tampil_stok_new = $koneksi_master->query("SELECT DISTINCT a.username, b.nama, a.kode_gudang, a.tanggal_bbm FROM pb_transaksi.tb_bbm a INNER JOIN pb_role.tb_user b ON a.create_by=b.kode_user WHERE kode_bbm='$kode_bbm' AND a.status='A' AND b.status='A'");
  $tampil_stok_new = $sql_tampil_stok_new->fetch_assoc();
  $username_new         = $tampil_stok_new['username'];
  $nama_new             = $tampil_stok_new['nama'];
  $kode_gudang_new      = $tampil_stok_new['kode_gudang'];

  // echo  'username_new='. $username_new . '<br>';
  // echo  'nama_new='. $nama_new . '<br>';
  // echo  'kode gudang='. $kode_gudang_new . '<br>';
  // echo  'Tanggal BBM='. $tanggal_bbm_new . '<br>';

  $sql_tampil_status_bbm = $koneksi_master->query("SELECT a.status_bbm FROM pb_transaksi.tb_bbm_detail a WHERE kode_bbm='$kode_bbm' AND kode_barang='$kode_barang' AND kode_po='$kode_po' AND a.status='A'");
  $tampil_status_bbm = $sql_tampil_status_bbm->fetch_assoc();
  $status_bbm_new         = $tampil_status_bbm['status_bbm'];

  if ($status_bbm_new == 'Y') {
    $sql_history = "INSERT INTO pb_transaksi.tb_history_stok values('$kode_po','$kode_gudang_new','$kode_barang','$nama_barang','$nama_new','$username_new','BBM',null,'$jumlah_pemenuhan','$stok_keluar',null,'A',null,'$kode_user',null,null,null,null)";
  }

  // $sql_history_stok = $koneksi_master->query($sql_history);  //*perulangannya
  echo $sql_history . '<br>';

}


// punya tabel stok
$sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new' AND status='A'");
$tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

$kode_barangstok_new     = $tampil_jumlah_stok['kode_barang'];
$kode_gudangstok_new     = $tampil_jumlah_stok['kode_gudang'];
$stok_new                = $tampil_jumlah_stok['jumlah_stok'] + $jumlah_pemenuhan;

// echo  'Stok='. $stok_new. '<br>';
// echo  'Kode Gudang Baru='. $kode_barangstok_new. '<br>';
// echo  'Kode Barang Baru='. $kode_gudangstok_new. '<br>';
// echo  'Kode Gudang='. $kode_gudang_new. '<br>';
// echo  'Kode Barang Baru1='. $kode_barang_new. '<br>';
// echo  'Jumlah Pemenuhan='. $jumlah_pemenuhan. '<br>' . '<br>';

if (($kode_barangstok_new == $kode_barang) and ($kode_gudangstok_new == $kode_gudang_new)) {
  $sql_stok = "UPDATE pb_transaksi.tb_stok SET onhandstok='$stok_new', update_by='$kode_user' WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudang_new'";
  // untuk mengupdate onhandstok jika kode barang dan kode gudang sudah ada
} else {
  $sql_stok = "INSERT INTO pb_transaksi.tb_stok values('$kode_barang','$kode_gudang_new','$jumlah_pemenuhan','A',null,'$kode_user',null,null,null,null)";
}

// $tampil_sql_stok = $koneksi_master->query($sql_stok);  //*perulangannya
// echo $sql_stok . '<br>';



// mengarah ke tabel barang dimaster
$sql_jumlah_stok_keseluruhan = $koneksi_master->query("SELECT SUM(onhandstok) 'stok_keseluruhan' FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND status='A'");
$jumlah_stok_keseluruhan = $sql_jumlah_stok_keseluruhan->fetch_assoc();

$onhandstok = $jumlah_stok_keseluruhan['stok_keseluruhan'];

// echo  'Stok = '. $stok_new. '<br>';
// echo  'Sum Jumlah Stok = '. $jumlah_stok_keseluruhan['jumlah_stok_keseluruhan']. '<br>';

  $sql_stok_keseluruhan = "UPDATE pb_master.tb_barang SET onhandstok='$onhandstok', update_by='$kode_user' WHERE id_barang='$kode_barang'";
  // untuk mengupdate onhandstok ditabel master jika kode barang sudah ada

// $tampil_sql_stok_keseluruhan = $koneksi_master->query($sql_stok_keseluruhan);  //*perulangannya
// echo $sql_stok_keseluruhan . '<br>';

?>





