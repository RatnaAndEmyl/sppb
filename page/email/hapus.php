<?php

$kode_email = $_GET['kode_email'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_email . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_email set status ='N', update_by='$kode_user' where kode_email='$kode_email'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=email";
</script>