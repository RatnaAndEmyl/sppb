<?php
$angka = date('Ymdhis');
$kode_po = $_GET['kode_po'];
$kode_barang = $_GET['kode_barang'];
//echo $kode_barang;



$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_po . $pc) <> $oc) {
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

    $sqltext = "UPDATE pb_transaksi.tb_po_detail SET status_po= 'N' WHERE kode_po='$kode_po' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
} else {

    $sqltext = "UPDATE pb_transaksi.tb_po_detail SET status_po= 'Y' WHERE kode_po='$kode_po' and kode_barang='$kode_barang'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
    </script>
<?php
}


?>