<?php

$nik = $_GET['nik'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($nik . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_master.tb_karyawan set status ='N' where nik='$nik'");


?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=karyawan";
</script>