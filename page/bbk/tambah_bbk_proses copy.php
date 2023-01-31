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
// echo $nama_barang . '<br>';
// echo $jumlah_permintaan . '<br>';
// echo 'permintaan '.$jumlah_permintaan . '<br>';
// echo 'pemenuhan '.$jumlah_pemenuhan . '<br>';
// echo $kode_satuan . '<br>';
// echo $nama_satuan . '<br>';

// if (($kode_barang == $kode_barang) and ($kode_permintaan == $kode_permintaan)) {
  
// }

if ($jumlah_permintaan > $jumlah_pemenuhan) { ?>
  <script type="text/javascript">
    alert("Jumlah Melebihi Permintaan")
    window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
  </script>
  <?php }

$simpan                 = $_POST['simpan'];

if ($simpan) {

  $sqltext = "INSERT INTO pb_transaksi.tb_bbk_detail values('$kode_bbk','$kode_permintaan','$kode_barang','$nama_barang','$jumlah_permintaan','$jumlah_pemenuhan','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
  $sql = $koneksi_master->query($sqltext);
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