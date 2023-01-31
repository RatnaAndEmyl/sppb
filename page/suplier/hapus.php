<?php

$kode_suplier = $_GET['kode_suplier'];
$no_hp_suplier = $_GET['no_hp_suplier'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_suplier . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_master.tb_suplier set status ='N', update_by='$kode_user' where kode_suplier='$kode_suplier'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=suplier";
</script>