<?php
$angka = date('Ymdhis');
$kode_aktiva = $_GET['kode_aktiva'];
$kode_trxtype     = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
    <script type="text/javascript">
        // alert("Tidak dapat mengubah data")
        // window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_master.tb_trxtype SET flag_ceklis ='N', update_by='$kode_user' WHERE kode_trxtype='$kode_trxtype'";

$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>
<script type="text/javascript">
    // alert("Pengingat Berhasil Dinonaktifkan")
    window.location.href = "?page=aktiva&aksi=detail&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_aktiva . $angka);?>";
</script>