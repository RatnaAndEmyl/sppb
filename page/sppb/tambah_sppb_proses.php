<?php
include '..\..\koneksi.php';

$kode_sppb                    = $_POST['kode_sppb'];
$kode_barang                  = $_POST['kode_barang'];
$keterangan_barang            = $_POST['keterangan_barang'];

echo $keterangan_barang. '<br>';

$sql_cari_nama_barang = $koneksi_master->query("SELECT * FROM pb_master.tb_barang WHERE id_barang='$kode_barang'");
$tampil_cari_nama_barang = $sql_cari_nama_barang->fetch_assoc();

$nama_barang = $tampil_cari_nama_barang['nama_barang'];

$jumlah_permintaan            = $_POST['jumlah_permintaan'];
// $jumlah_pemenuhan             = $_POST['jumlah_pemenuhan'];

$sql_cari_nama_satuan = $koneksi_master->query("SELECT * FROM pb_master.tb_barang a INNER JOIN pb_master.tb_satuan c ON a.kode_satuan=c.kode_satuan WHERE a.STATUS='A' AND id_barang='$kode_barang'");
$tampil_cari_nama_satuan = $sql_cari_nama_satuan->fetch_assoc();

$kode_satuan = $tampil_cari_nama_satuan['kode_satuan'];
$nama_satuan = $tampil_cari_nama_satuan['nama_satuan'];

// echo $kode_satuan . '<br>';
// echo $nama_satuan . '<br>';
$simpan                       = $_POST['simpan'];

if ($simpan) {

  $sqltext = "INSERT INTO pb_transaksi.tb_sppb_detail values('$kode_sppb','$kode_barang','$nama_barang','$jumlah_permintaan','$kode_satuan','$nama_satuan','A',upper('$keterangan_barang'),'A',null,'$kode_user',null,null,null,null)";
  // echo $sqltext;
  $sql = $koneksi_master->query($sqltext);

  if ($sql) {
?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";
    </script>

  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";
    </script>
<?php
  }
}

?>