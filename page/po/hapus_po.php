<?php
$angka = date('Ymdhis');
$kode_po = $_GET['kode_po'];
$kode_barang     = $_GET['kode_barang'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_po . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_po_detail SET status ='N', update_by='$kode_user' WHERE kode_po='$kode_po' AND kode_barang='$kode_barang'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=po&aksi=detail&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";
</script>