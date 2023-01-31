<?php

$kode_gudang = $_GET['kode_gudang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_gudang . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_gudang set status ='N', update_by='$kode_user' where kode_gudang='$kode_gudang'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=gudang";
</script>