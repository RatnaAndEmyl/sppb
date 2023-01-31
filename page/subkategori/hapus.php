<?php

$kode_subkategori = $_GET['kode_subkategori'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_subkategori . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_subkategori set status ='N', update_by='$kode_user' where kode_subkategori='$kode_subkategori'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=subkategori";
</script>