<?php
$angka = date('Ymdhis');
$kode_bbk = $_GET['kode_bbk'];
$kode_barang = $_GET['kode_barang'];
$tgl_create = $_GET['tgl_create'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
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

    $sqltext = "UPDATE pb_transaksi.tb_bbk_detail SET status_bbk= 'N' WHERE kode_bbk='$kode_bbk' and kode_barang='$kode_barang' and tgl_create='$tgl_create'";
    $sql = $koneksi_master->query($sqltext);
} else {

    $sqltext = "UPDATE pb_transaksi.tb_bbk_detail SET status_bbk= 'Y' WHERE kode_bbk='$kode_bbk' and kode_barang='$kode_barang' and tgl_create='$tgl_create'";
    $sql = $koneksi_master->query($sqltext);
}

if ($sql) {
?>

    <script type="text/javascript">
        // alert("Status Berhasil Disimpan");
        window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
    </script>
<?php
}


?>