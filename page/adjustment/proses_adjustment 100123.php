<?php
$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];
$kode_barang = $_GET['kode_barang'];
$tgl_create = $_GET['tgl_create'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_adjustment . $pc) <> $oc) {
?>

    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>

<?php
}

?>

<?php

if (isset($_GET['tidak_disetujui'])) { ?>

    <script type="text/javascript">
        window.location.href = "?page=adjustment&aksi=alasan_tolak&kode_adjustment=<?php echo $kode_adjustment; ?>&kode_barang=<?php echo $kode_barang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>
<?php } else {

    $sqltext = "UPDATE pb_transaksi.tb_adjustment_detail SET status_adjustment= 'Y' WHERE kode_adjustment='$kode_adjustment' and kode_barang='$kode_barang' and tgl_create='$tgl_create'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>
<?php
}


?>