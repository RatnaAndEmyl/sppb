<?php
include '..\..\koneksi.php';

$kode_po              = $_POST['kode_po'];
$tgl_create           = $_POST['tgl_create'];
$jumlah_pemenuhan     = $_POST['jumlah_pemenuhan'];
$harga_satuan         = $_POST['harga_satuan'];

$harga_satuan_string = preg_replace("/[^0-9]/","",$harga_satuan);

$total_harga = $harga_satuan_string * $jumlah_pemenuhan;


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb_detail WHERE tgl_create='$tgl_create'");
$tampil = $sql->fetch_assoc();

$kode_barang            = $tampil['kode_barang'];
$kode_sppb              = $tampil['kode_sppb'];
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

$simpan                       = $_POST['simpan'];

if ($simpan) {

  $sql_hitung_jumlah_pemenuhan = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', SUM(total_harga) 'jumlah_harga', kode_sppb, kode_barang FROM pb_transaksi.tb_po_detail WHERE kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND kode_po='$kode_po'");
  $tampil_hitung_jumlah_pemenuhan = $sql_hitung_jumlah_pemenuhan->fetch_assoc();
  
  $kode_sppb_new        = $tampil_hitung_jumlah_pemenuhan['kode_sppb'];
  $kode_barang_new      = $tampil_hitung_jumlah_pemenuhan['kode_barang'];
  $jumlah_pemenuhan_new = $tampil_hitung_jumlah_pemenuhan['jumlah'] + $jumlah_pemenuhan;
  $jumlah_harga_new     = $tampil_hitung_jumlah_pemenuhan['jumlah_harga'] + $total_harga;

  // echo $jumlah_harga_new.'<br>';
  // echo $jumlah_pemenuhan_new.'<br>';
  // echo $jumlah_sppb_new;

  if (($kode_sppb_new == $kode_sppb) AND ($kode_barang_new == $kode_barang)) {
    $sqltext = "UPDATE pb_transaksi.tb_po_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', total_harga='$jumlah_harga_new',update_by='$kode_user' where kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND kode_po='$kode_po'";
  } else {
    $sqltext = "INSERT INTO pb_transaksi.tb_po_detail values('$kode_po','$kode_sppb','$kode_barang','$nama_barang','$jumlah_permintaan','$jumlah_pemenuhan','$harga_satuan_string','$total_harga','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
  }
 
  $sql = $koneksi_master->query($sqltext);
  // echo $sqltext . '<br>';

  if ($sql) {
?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>

  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>
<?php
  }
}

?>