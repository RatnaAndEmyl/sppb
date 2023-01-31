<?php
$angka = date('Ymdhis');
$kode_bbk = $_GET['kode_bbk'];
$kode_barang     = $_GET['kode_barang'];
$tgl_create     = $_GET['tgl_create'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_transaksi.tb_bbk_detail SET status ='N', update_by='$kode_user' WHERE kode_bbk='$kode_bbk' AND kode_barang='$kode_barang' AND tgl_create='$tgl_create'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=bbk&aksi=detail&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
</script>