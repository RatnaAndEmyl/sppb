<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_sppb = $_POST["cari_permintaan_barang_sppb"];
$kode_po = $_POST["kode_po"];

// echo $cari_permintaan_barang_sppb;

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb_detail WHERE tgl_create='$cari_permintaan_barang_sppb' AND status='A'");
$tampil = $sql->fetch_assoc();

$jumlah_permintaan =  $tampil['jumlah_permintaan'];
$kode_sppb =  $tampil['kode_sppb'];
$kode_barang =  $tampil['kode_barang'];

$sql1 = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_sppb_detail WHERE kode_sppb='$kode_sppb' AND kode_barang='$kode_barang' AND status='A'");
$tampil1 = $sql1->fetch_assoc();
$jumlah_permintaan =  $tampil1['jumlah_permintaan'];
$nama_satuan =  $tampil1['nama_satuan'];
// echo $jumlah_permintaan . '<br>';


$sql2 = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_po_detail WHERE kode_sppb='$kode_sppb' AND kode_po='$kode_po' AND kode_barang='$kode_barang' AND status='A' group by kode_sppb");
$tampil2 = $sql2->fetch_assoc();
$jumlah_pemenuhan =  $tampil2['jumlah'];
// echo $jumlah_pemenuhan . '<br>';


$jumlah_total = $jumlah_permintaan - $jumlah_pemenuhan;
// echo "Total : ". $jumlah_total.'<br>';

?>
<?php if ($kode_sppb <> '') { ?>
    <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111"><b style='color: #4CC417;'>(Jumlah Maksimal Yang Dapat Diinputkan :  <?php echo  $jumlah_total; ?>  <?php echo  $nama_satuan; ?>)</b></label> <br>

    <?php } ?>