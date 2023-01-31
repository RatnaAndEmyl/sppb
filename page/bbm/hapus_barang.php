<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
$kode_barang     = $_GET['kode_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_bbm_detail SET status ='N', update_by='$kode_user' WHERE kode_bbm='$kode_bbm' AND kode_barang='$kode_barang'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=bbm&aksi=detail&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
</script>