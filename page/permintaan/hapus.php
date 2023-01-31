<?php

$kode_permintaan = $_GET['kode_permintaan'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_permintaan . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_transaksi.tb_permintaan set status ='N', update_by='$kode_user' where kode_permintaan='$kode_permintaan'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=home";
</script>