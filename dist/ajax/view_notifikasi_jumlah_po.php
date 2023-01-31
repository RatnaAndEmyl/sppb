<?php
// usersubmodul.php
include "..\\..\\koneksi.php";
$angka = date('Ymdhis');
$cari_permintaan_barang_po = $_POST["cari_permintaan_barang_po"];
$jumlah_barang_po = $_POST["jumlah_barang_po"];
$kode_bbm = $_POST["kode_bbm"];

// echo $cari_permintaan_barang_po . '<br>';
// echo $jumlah_barang_po . '<br>'; 

$sql = $koneksi_master->query("SELECT * FROM  pb_transaksi.tb_po_detail WHERE tgl_create='$cari_permintaan_barang_po'");
$tampil = $sql->fetch_assoc();

$jumlah_pemenuhan =  isset($tampil['jumlah_pemenuhan']) ? $tampil['jumlah_pemenuhan'] : '';
$kode_po =  isset($tampil['kode_po']) ? $tampil['kode_po'] : '';
$kode_barang =  isset($tampil['kode_barang']) ? $tampil['kode_barang'] : '';
// $jumlah_pemenuhan =  $tampil['jumlah_pemenuhan'];
// $kode_po =  $tampil['kode_po'];
// $kode_barang =  $tampil['kode_barang'];
// echo $jumlah_pemenuhan . '<br>';

$sql2 = $koneksi_master->query("SELECT SUM(jumlah_pemenuhan) 'jumlah' FROM  pb_transaksi.tb_bbm_detail WHERE kode_po='$kode_po' AND kode_bbm='$kode_bbm' AND kode_barang='$kode_barang' AND status='A' group by kode_po");
$tampil2 = $sql2->fetch_assoc();
$jumlah_pemenuhan_new =  isset($tampil2['jumlah']) ? $tampil2['jumlah'] : '';

// echo $jumlah_pemenuhan_new. '<br>';

$jumlah_total = floatval($jumlah_pemenuhan) - floatval($jumlah_pemenuhan_new);
// echo "Total : ". $jumlah_total.'<br>';
?>

<?php if (($jumlah_total < $jumlah_barang_po) or ($jumlah_barang_po == '0')) { ?>
    <!-- echo "<b style='color: red;'>Permintaan Tidak Sesuai</b><br><br>"; -->
    <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111"><b style='color: red;'>Jumlah Tidak Sesuai</b></label> <br>

    <?php } else {
    echo ' '; ?>
        <?php
        if (($jumlah_barang_po <> '') and ($jumlah_barang_po <= $jumlah_total)) { ?>
            <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
    <?php }
    } ?>

    <a href="?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>" class="btn btn-dark">Kembali</a>