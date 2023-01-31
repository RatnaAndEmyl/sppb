<?php
$angka = date('Ymdhis');
$kode_permintaan = $_GET['kode_permintaan'];
$kode_barang = $_GET['kode_barang'];
//echo $kode_barang;



$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_permintaan . $pc) <> $oc) {
?>

    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>

<?php
}

?>

<?php

if (isset($_GET['tidak_disetujui'])) {

    $sqltext = "UPDATE pb_transaksi.tb_permintaan_detail SET status_permintaan= 'N' WHERE kode_permintaan='$kode_permintaan' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
} else {

    $sqltext = "UPDATE pb_transaksi.tb_permintaan_detail SET status_permintaan= 'Y' WHERE kode_permintaan='$kode_permintaan' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=permintaan&aksi=detail&kode_permintaan=<?php echo $kode_permintaan; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_permintaan . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=permintaan&aksi=detail&kode_permintaan=<?php echo $kode_permintaan; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_permintaan . $angka); ?>";
    </script>
<?php
}


?>