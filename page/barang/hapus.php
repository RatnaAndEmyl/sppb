<?php

$id_barang = $_GET['id_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($id_barang . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("update pb_master.tb_barang set status ='N', update_by='$kode_user' where id_barang='$id_barang'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=barang";
</script>