<?php

$kode_subdepartemen = $_GET['kode_subdepartemen'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_subdepartemen . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_master.tb_subdepartemen_karyawan set status ='N' where kode_subdepartemen='$kode_subdepartemen'");


?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=subdepartemen";
</script>