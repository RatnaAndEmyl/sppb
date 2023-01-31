<?php
$angka = date('Ymdhis');
$kode_adjustment = $_GET['kode_adjustment'];
$kode_barang     = $_GET['kode_barang'];
$tgl_create     = $_GET['tgl_create'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_adjustment . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_adjustment_detail SET status ='N', update_by='$kode_user' WHERE kode_adjustment='$kode_adjustment' AND kode_barang='$kode_barang' AND tgl_create='$tgl_create'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=adjustment&aksi=detail&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
</script>