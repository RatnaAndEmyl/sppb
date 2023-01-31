<?php
include '..\..\koneksi.php';
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
$tanggal_sekarang = date('1, Y-m-d H:i:s');
echo $tanggal_sekarang; 

$kode_po              = $_POST['kode_po'];
$tgl_create           = $_POST['tgl_create'];
$jumlah_pemenuhan     = $_POST['jumlah_pemenuhan'];
$harga_satuan         = $_POST['harga_satuan'];

$harga_satuan_string = preg_replace("/[^0-9]/", "", $harga_satuan);

$total_harga = $harga_satuan_string * $jumlah_pemenuhan;


$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb_detail WHERE tgl_create='$tgl_create'");
$tampil = $sql->fetch_assoc();

$kode_barang            = $tampil['kode_barang'];
$kode_sppb              = $tampil['kode_sppb'];
$nama_barang            = $tampil['nama_barang'];
$jumlah_permintaan      = $tampil['jumlah_permintaan'];
$kode_satuan            = $tampil['kode_satuan'];
$nama_satuan            = $tampil['nama_satuan'];


$sql2_pemenuhan = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_po_detail WHERE kode_sppb='$kode_sppb' AND kode_po='$kode_po' AND kode_barang='$kode_barang' AND status='A' group by kode_sppb");
$tampil2 = $sql2_pemenuhan->fetch_assoc();
$jumlah_pemenuhan_sum =  $tampil2['jumlah'];

if ($jumlah_pemenuhan_sum == '') {
  $jumlah_pemenuhan_sum = 0;
}
$jumlah_total = $jumlah_permintaan - $jumlah_pemenuhan_sum;

// echo 'jumlah_pemenuhan y :'.$jumlah_pemenuhan.'<br>';
// echo 'jumlah_pemenuhan sum :'.$jumlah_pemenuhan_sum.'<br>';
// echo 'Jumlah Total= ' . $jumlah_total . '<br>';

$simpan                       = $_POST['simpan'];


if ($simpan) {

  if (($jumlah_pemenuhan > $jumlah_total) or ($jumlah_pemenuhan == '0')) {
?>
    <script type="text/javascript">
      alert("Jumlah Tidak Sesuai")
      window.location.href = "?page=po&aksi=tambah_po&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
      // window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>

  <?php } else {

    $sql_hitung_jumlah_pemenuhan = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah', SUM(total_harga) 'jumlah_harga', kode_sppb, kode_barang FROM pb_transaksi.tb_po_detail WHERE kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND kode_po='$kode_po'");
    $tampil_hitung_jumlah_pemenuhan = $sql_hitung_jumlah_pemenuhan->fetch_assoc();

    $kode_sppb_new        = $tampil_hitung_jumlah_pemenuhan['kode_sppb'];
    $kode_barang_new      = $tampil_hitung_jumlah_pemenuhan['kode_barang'];
    $jumlah_pemenuhan_new = $tampil_hitung_jumlah_pemenuhan['jumlah'] + $jumlah_pemenuhan;
    $jumlah_harga_new     = $tampil_hitung_jumlah_pemenuhan['jumlah_harga'] + $total_harga;


    if (($kode_sppb_new == $kode_sppb) and ($kode_barang_new == $kode_barang)) {
      $sqltext = "UPDATE pb_transaksi.tb_po_detail SET jumlah_pemenuhan='$jumlah_pemenuhan_new', total_harga='$jumlah_harga_new',update_by='$kode_user' where kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND kode_po='$kode_po'";
    } else if (($kode_sppb_new <> $kode_sppb) and ($kode_barang_new <> $kode_barang)) {
      $sqltext = "INSERT INTO pb_transaksi.tb_po_detail values('$kode_po','$kode_sppb','$kode_barang','$nama_barang','$jumlah_permintaan','$jumlah_pemenuhan','$harga_satuan_string','$total_harga','$kode_satuan','$nama_satuan','A','A',null,'$kode_user',null,null,null,null)";
    }
  }

  $sql = $koneksi_master->query($sqltext);
  // echo $sqltext . '<br>';

  if ($sql) { ?>

    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
      window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>

  <?php } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>
<?php
  }
}

?>