<?php

$kode_mapping_reminder = $_GET['kode_mapping_reminder'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping_reminder . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_mapping_reminder set status ='N', update_by='$kode_user' where kode_mapping_reminder='$kode_mapping_reminder'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=mapping_reminder";
</script>