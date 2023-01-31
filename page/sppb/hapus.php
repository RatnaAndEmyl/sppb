<?php

$kode_sppb = $_GET['kode_sppb'];

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

$sql = $koneksi_master->query("update pb_transaksi.tb_sppb set status ='N', update_by='$kode_user' where kode_sppb='$kode_sppb'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=home";
</script>