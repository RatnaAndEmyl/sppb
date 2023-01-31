<?php

$kode_submodul = $_GET['kode_submodul'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_submodul . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_role.tb_submodul set status ='N' where kode_submodul='$kode_submodul'");


?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=submodul";
</script>