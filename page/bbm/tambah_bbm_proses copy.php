<?php
include '..\..\koneksi.php';
$kode_bbm                = $_POST['kode_bbm'];
$tgl_create              = $_POST['tgl_create'];
$jumlah_pemenuhan       = $_POST['jumlah_pemenuhan'];

// echo $jumlah_pemenuhan . '<br>';

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_po_detail WHERE tgl_create='$tgl_create'");
$tampil = $sql->fetch_assoc();

$kode_barang            = $tampil['kode_barang'];
$kode_po                = $tampil['kode_po'];
$nama_barang            = $tampil['nama_barang'];
// $jumlah_permintaan      = $tampil['jumlah_permintaan'];
$jumlah_pemenuhan_po       = $tampil['jumlah_pemenuhan'];
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

  $sql_tampil_jumlah_pemenuhan_bbm = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', kode_po, kode_barang FROM pb_transaksi.tb_bbm_detail WHERE kode_po='$kode_po' AND kode_barang='$kode_barang' AND kode_bbm='$kode_bbm'");
  $tampil_jumlah_pemenuhan_bbm = $sql_tampil_jumlah_pemenuhan_bbm->fetch_assoc();

  $kode_po_new          = $tampil_jumlah_pemenuhan_bbm['kode_po'];
  $kode_barang_new      = $tampil_jumlah_pemenuhan_bbm['kode_barang'];
  $jumlah_pemenuhan_new = $tampil_jumlah_pemenuhan_bbm['jumlah'] + $jumlah_pemenuhan;
  // echo $jumlah_po_new;


  if (($kode_po_new == $kode_po) and ($kode_barang_new == $kode_barang)) {
    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', update_by='$kode_user' where kode_po='$kode_po' AND kode_barang='$kode_barang' AND kode_bbm='$kode_bbm'";
    // untuk mengupdate jumlah pemenuhan jika kode po dan kode barang udah ada
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_bbm_detail values('$kode_bbm','$kode_po','$kode_barang','$nama_barang','$jumlah_pemenuhan_po','$jumlah_pemenuhan','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
  }

  $sql = $koneksi_master->query($sqltext);
  // echo $sqltext;

  if ($sql) { ?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>

  <?php } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>
<?php
  }
}

?>