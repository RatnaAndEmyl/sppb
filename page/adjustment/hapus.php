<?php

$kode_adjustment = $_GET['kode_adjustment'];
$tgl_create      = $_GET['tgl_create'];

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

// digunakan untuk hapus foto difolder img_adjustment secara permanen 
$sql_foto = "SELECT * FROM pb_transaksi.tb_adjustment WHERE kode_adjustment='$kode_adjustment' AND tgl_create='$tgl_create'";
$sql_tampil_foto = $koneksi_master->query($sql_foto);
$sql_tampil_foto = $sql_tampil_foto->fetch_assoc();

$foto = $sql_tampil_foto['file'];


if (file_exists("dist/img_adjustment/$foto")) {
    unlink("dist/img_adjustment/$foto");
}
//

$sql = $koneksi_master->query("UPDATE pb_transaksi.tb_adjustment SET status ='N', update_by='$kode_user' WHERE kode_adjustment='$kode_adjustment'");

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=adjustment";
</script>