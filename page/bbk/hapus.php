<?php

$kode_bbk = $_GET['kode_bbk'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_transaksi.tb_bbk set status ='N', update_by='$kode_user' where kode_bbk='$kode_bbk'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=home";
</script>