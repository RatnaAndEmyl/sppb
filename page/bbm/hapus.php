<?php

$kode_bbm = $_GET['kode_bbm'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_transaksi.tb_bbm set status ='N', update_by='$kode_user' where kode_bbm='$kode_bbm'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=home";
</script>