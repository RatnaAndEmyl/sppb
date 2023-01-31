<?php
$angka = date('Ymdhis');
$kode_email = $_GET['kode_email'];
$kode_trxtype     = $_GET['kode_trxtype'];
$tgl_create     = $_GET['tgl_create'];

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
$sqltext = "UPDATE pb_transaksi.tb_pengingat_email SET status ='N', update_by='$kode_user' WHERE kode_trxtype='$kode_trxtype' and kode_email='$kode_email' and tgl_create='$tgl_create'";

$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";
</script>