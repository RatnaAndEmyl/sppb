<?php

$kode_trxtype = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_trxtype set status ='N', update_by='$kode_user' where kode_trxtype='$kode_trxtype'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=trxtype";
</script>