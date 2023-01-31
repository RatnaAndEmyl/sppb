<?php
$angka = date('Ymdhis');
$kode_aktiva = $_GET['kode_aktiva'];
$kode_trxtype     = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_aktiva . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_aktiva_detail SET status ='N', update_by='$kode_user' WHERE kode_aktiva='$kode_aktiva' AND kode_trxtype='$kode_trxtype'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=aktiva&aksi=detail&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_aktiva . $angka);?>";
</script>