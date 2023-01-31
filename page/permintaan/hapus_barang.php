<?php
$angka = date('Ymdhis');
$kode_permintaan = $_GET['kode_permintaan'];
$kode_barang     = $_GET['kode_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_permintaan . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_permintaan_detail SET status ='N', update_by='$kode_user' WHERE kode_permintaan='$kode_permintaan' AND kode_barang='$kode_barang'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=permintaan&aksi=detail&kode_permintaan=<?php echo $kode_permintaan; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_permintaan . $angka); ?>";
</script>