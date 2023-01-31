<?php
$angka = date('Ymdhis');

$kode_trxtype = $_GET['kode_trxtype'];
$tgl_create = $_GET['tgl_create'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}
$sqltext = "UPDATE pb_master.tb_subtrxtype SET status ='N', update_by='$kode_user' WHERE kode_trxtype='$kode_trxtype' AND tgl_create='$tgl_create'";
$sql = $koneksi_master->query("$sqltext");


?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=subtrxtype&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";
</script>