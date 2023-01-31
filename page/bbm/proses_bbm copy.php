<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
$kode_barang = $_GET['kode_barang'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
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

    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET status_bbm= 'N' WHERE kode_bbm='$kode_bbm' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
} else {

    $sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET status_bbm= 'Y' WHERE kode_bbm='$kode_bbm' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        alert("Status Berhasil Disimpan")
        window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        alert("Status Gagal Disimpan");
        window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>
<?php
}


?>