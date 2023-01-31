<?php
$angka = date('Ymdhis');
$kode_mapping = $_GET['kode_mapping'];
$kode_trxtype     = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_master.tb_mapping_detail SET status ='N', update_by='$kode_user' WHERE kode_mapping='$kode_mapping' AND kode_trxtype='$kode_trxtype'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=mapping&aksi=detail&kode_mapping=<?php echo $kode_mapping; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping . $angka);?>";
</script>