<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_po = $_POST["cari_permintaan_barang_po"];
$kode_bbm = $_POST["kode_bbm"];

// echo $cari_permintaan_barang_po;

$sql_tampil_data_po = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_po_detail WHERE tgl_create='$cari_permintaan_barang_po'");
$tampil_data_po = $sql_tampil_data_po->fetch_assoc();

$jumlah_permintaan =  $tampil_data_po['jumlah_permintaan'];
$kode_po           =  $tampil_data_po['kode_po'];
$kode_barang       =  $tampil_data_po['kode_barang'];

$sql1 = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_po_detail WHERE kode_po='$kode_po' AND kode_barang='$kode_barang'");
$tampil1 = $sql1->fetch_assoc();
$jumlah_permintaan =  $tampil1['jumlah_permintaan'];
// echo $jumlah_permintaan . '<br>';

$sql2 = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_bbm_detail WHERE kode_po='$kode_po' AND kode_bbm='$kode_bbm' AND kode_barang='$kode_barang' group by kode_po");
$tampil2 = $sql2->fetch_assoc();
$jumlah_pemenuhan =  $tampil2['jumlah'];

$jumlah_total = $jumlah_permintaan - $jumlah_pemenuhan;
// echo "Total : ". $jumlah_total.'<br>';
?>
<?php if ($kode_po <> '') { ?>
    <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111"><b style='color: #4CC417;'>(Barang yang dapat di inputkan : <?php echo  $jumlah_total; ?>)</b></label> <br>
    <?php } ?>