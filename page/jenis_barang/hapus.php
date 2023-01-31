<?php

$id_jenis_barang = $_GET['id_jenis_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($id_jenis_barang . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_master.tb_jenis_barang set status ='N', update_by='$kode_user' where id_jenis_barang='$id_jenis_barang'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=jenis_barang";
</script>