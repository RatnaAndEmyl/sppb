<?php
$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];
$kode_barang = $_GET['kode_barang'];
//echo $kode_barang;



$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_sppb . $pc) <> $oc) {
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

    $sqltext = "UPDATE pb_transaksi.tb_sppb_detail SET status_sppb= 'N' WHERE kode_sppb='$kode_sppb' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
} else {

    $sqltext = "UPDATE pb_transaksi.tb_sppb_detail SET status_sppb= 'Y' WHERE kode_sppb='$kode_sppb' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan")
        window.location.href = "?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";
    </script>
<?php
}


?>