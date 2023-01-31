<?php

$kode_mapping = $_GET['kode_mapping'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_mapping_master set status ='N', update_by='$kode_user' where kode_mapping='$kode_mapping'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=mapping";
</script>