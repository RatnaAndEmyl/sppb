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

  if (($kode_permintaan_new == $kode_permintaan) and ($kode_barang_new == $kode_barang)) {
    $sqltext = "UPDATE pb_transaksi.tb_bbk_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', update_by='$kode_user' where kode_permintaan='$kode_permintaan' AND kode_barang='$kode_barang' AND kode_bbk='$kode_bbk'";
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_bbk_detail values('$kode_bbk','$kode_permintaan','$kode_barang','$nama_barang','$jumlah_permintaan','$jumlah_pemenuhan','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
  }


  $sql = $koneksi_master->query($sqltext);  //*perulangannya
  // echo $sqltext;

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

?>