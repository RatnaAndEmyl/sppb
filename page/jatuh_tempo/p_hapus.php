<?php
$angka = date('Ymdhis');
// $kode_aktiva = $_GET['kode_aktiva'];
$kode_trxtype     = $_GET['kode_trxtype'];
$kode_pengingat     = $_GET['kode_pengingat'];

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
$sqltext = "UPDATE pb_transaksi.tb_pengingat SET status ='N', update_by='$kode_user' WHERE kode_pengingat='$kode_pengingat' and kode_trxtype='$kode_trxtype'";

//keknya masih salah ;(
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka);?>";
</script>