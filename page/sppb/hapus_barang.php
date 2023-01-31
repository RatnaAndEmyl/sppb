<?php
$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];
$kode_barang     = $_GET['kode_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_sppb . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_sppb_detail SET status ='N', update_by='$kode_user' WHERE kode_sppb='$kode_sppb' AND kode_barang='$kode_barang'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=sppb&aksi=detail&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";
</script>