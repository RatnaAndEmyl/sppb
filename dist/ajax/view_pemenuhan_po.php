<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_po = $_POST["cari_permintaan_barang_po"];
$kode_bbm = $_POST["kode_bbm"];

// echo $cari_permintaan_barang_po;

$sql_tampil_data_po = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_po_detail WHERE tgl_create='$cari_permintaan_barang_po'");
$tampil_data_po = $sql_tampil_data_po->fetch_assoc();

$jumlah_pemenuhan_po =  isset($tampil_data_po['jumlah_pemenuhan']) ? $tampil_data_po['jumlah_pemenuhan'] : '';
$kode_po           =  isset($tampil_data_po['kode_po']) ? $tampil_data_po['kode_po'] : '';
$kode_barang       =  isset($tampil_data_po['kode_barang']) ? $tampil_data_po['kode_barang'] : '';
// $jumlah_pemenuhan_po =  $tampil_data_po['jumlah_pemenuhan'];
// $kode_po           =  $tampil_data_po['kode_po'];
// $kode_barang       =  $tampil_data_po['kode_barang'];
// echo $jumlah_pemenuhan_po . '<br>';
// echo $kode_po . '<br>';
// echo $jumlah_pemenuhan_po . '<br>';
// echo $jumlah_pemenuhan_po . '<br>';

$sql1 = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_po_detail WHERE kode_po='$kode_po' AND kode_barang='$kode_barang'");
$tampil1 = $sql1->fetch_assoc();
$nama_satuan =  isset($tampil1['nama_satuan']) ? $tampil1['nama_satuan'] : '';

$sql2 = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_bbm_detail WHERE kode_po='$kode_po' AND kode_bbm='$kode_bbm' AND kode_barang='$kode_barang' and status='A 'group by kode_po");
$tampil2 = $sql2->fetch_assoc();
$jumlah_pemenuhan =  isset($tampil2['jumlah']) ? $tampil2['jumlah'] : '';
// $jumlah_pemenuhan =  $tampil2['jumlah'];
// echo $jumlah_pemenuhan . '<br>';

$jumlah_total = floatval($jumlah_pemenuhan_po) - floatval($jumlah_pemenuhan);
// echo "Total : ". $jumlah_total.'<br>';
?>
<?php if ($kode_po <> '') { ?>

    <div class="table-responsive" id="table-responsive">
        <!-- <label for="exampleInputEmail111"><b style='color: #00a000;'>(Jumlah Maksimal Yang Dapat Diinputkan :  <?php echo  $jumlah_total; ?>)</b></label> <br> -->

        <label for="exampleInputEmail111"><b style='color: #4CC417;'>(Jumlah Maksimal Yang Dapat Diinputkan :  <?php echo  $jumlah_total; ?> <?php echo  $nama_satuan; ?>)</b></label> <br>
    <?php } ?>