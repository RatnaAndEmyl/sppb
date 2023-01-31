<?php

$kode_kategori = $_GET['kode_kategori'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_kategori . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_kategori set status ='N', update_by='$kode_user' where kode_kategori='$kode_kategori'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=kategori";
</script>