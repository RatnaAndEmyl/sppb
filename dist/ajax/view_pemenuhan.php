<?php

include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_pbk = $_POST["cari_permintaan_barang_pbk"];
// $jumlah_barang_disetujui = $_POST["jumlah_barang_disetujui"];
$kode_bbk = $_POST["kode_bbk"];

// echo $cari_permintaan_barang_pbk;
//echo $jumlah_barang_disetujui; 


$sql = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_permintaan_detail WHERE tgl_create='$cari_permintaan_barang_pbk'");
$tampil = $sql->fetch_assoc();
$jumlah_permintaan =  isset($tampil['jumlah_permintaan']) ? $tampil['jumlah_permintaan'] : '';
$kode_permintaan =  isset($tampil['kode_permintaan']) ? $tampil['kode_permintaan'] : '';
$kode_barang =  isset($tampil['kode_barang']) ? $tampil['kode_barang'] : '';

// $jumlah_permintaan =  $tampil['jumlah_permintaan'];
// $kode_permintaan =  $tampil['kode_permintaan'];
// $kode_barang =  $tampil['kode_barang'];


$punya_bbk = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_bbk WHERE kode_bbk='$kode_bbk'");
$tampil_punya_bbk = $punya_bbk->fetch_assoc();
$kode_gudangku = $tampil_punya_bbk['kode_gudang'];
 

$sql1 = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_permintaan_detail WHERE kode_permintaan='$kode_permintaan' AND kode_barang='$kode_barang'");
$tampil1 = $sql1->fetch_assoc();
$jumlah_permintaan =  isset($tampil1['jumlah_permintaan']) ? $tampil1['jumlah_permintaan'] : ''; 
$nama_satuan       =  isset($tampil1['nama_satuan']) ? $tampil1['nama_satuan'] : ''; 
// echo $jumlah_permintaan . '<br>';

$sql2 = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_bbk_detail WHERE kode_permintaan='$kode_permintaan' AND kode_bbk='$kode_bbk' AND kode_barang='$kode_barang' group by kode_permintaan");
$tampil2 = $sql2->fetch_assoc();
$jumlah_pemenuhan =  isset($tampil2['jumlah']) ? $tampil2['jumlah'] : '';
// $jumlah_pemenuhan =  $tampil2['jumlah'];

$jumlah_total = floatval($jumlah_permintaan) - floatval($jumlah_pemenuhan); //jumlah_total itu untuk menghitung jumlah permintaan yang dari permintaan detail trs dikurang jumlah pemenuhan yang diinputkan di bbk detail
// echo "Total : ". $jumlah_total.'<br>';

$sql_tampil_jumlah_stok = $koneksi_master->query("SELECT SUM(onhandstok) 'jumlah_stok', onhandstok, kode_gudang, kode_barang FROM pb_transaksi.tb_stok WHERE kode_barang='$kode_barang' AND kode_gudang='$kode_gudangku'");
$tampil_jumlah_stok = $sql_tampil_jumlah_stok->fetch_assoc();

$stok              = $tampil_jumlah_stok['jumlah_stok'];
// echo $stok  . '<br>';

?>
<?php if (($kode_permintaan <> '') and ($stok == '')) { ?>
    <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111"><b style='color: #FF7F50;'>(Stok Barang Habis)</b></label> <br>
    </div>
<?php } else if ($kode_permintaan <> '') { ?>
    <div class="table-responsive" id="table-responsive">
        <!-- <b><h5>- Stok Tersedia : <?php echo  $stok; ?> <?php echo  $nama_satuan; ?></h5></b> -->

        <label for="exampleInputEmail111"><b>- Stok Tersedia : <?php echo  $stok; ?> <?php echo  $nama_satuan; ?></b></label> <br><br>

        <label for="exampleInputEmail111"><b style='color: #4CC417;'>(Jumlah Maksimal Yang Dapat Diinputkan : <?php echo  $jumlah_total; ?> <?php echo  $nama_satuan; ?>)</b></label> <br>

    </div>
<?php } ?>