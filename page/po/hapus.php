<?php

$kode_po = $_GET['kode_po'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_po . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_transaksi.tb_po set status ='N', update_by='$kode_user' where kode_po='$kode_po'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=home";
</script>