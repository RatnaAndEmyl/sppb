<?php

$kode_aktiva = $_GET['kode_aktiva'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_aktiva . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_transaksi.tb_aktiva set status ='N', update_by='$kode_user' where kode_aktiva='$kode_aktiva'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=aktiva";
</script>