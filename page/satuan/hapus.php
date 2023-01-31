<?php

$kode_satuan = $_GET['kode_satuan'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_satuan . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_satuan set status ='N', update_by='$kode_user' where kode_satuan='$kode_satuan'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=satuan";
</script>