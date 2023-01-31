<?php
$angka = date('Ymdhis');
$kode_aktiva = $_GET['kode_aktiva'];
$kode_trxtype     = $_GET['kode_trxtype'];
$tgl_create     = $_GET['tgl_create'];

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

// digunakan untuk hapus foto permanen 
$sql1text = "SELECT * FROM pb_transaksi.tb_aktiva_detail WHERE kode_aktiva='$kode_aktiva' AND kode_trxtype='$kode_trxtype' AND tgl_create='$tgl_create'";
$sql1 = $koneksi_master->query($sql1text);
$sql1= $sql1->fetch_assoc();
$foto = $sql1['file'];


if (file_exists("dist/img_web/$foto")) {
    unlink("dist/img_web/$foto");
}
//

$sqltext = "UPDATE pb_transaksi.tb_aktiva_detail SET status ='N', update_by='$kode_user' WHERE kode_aktiva='$kode_aktiva' AND kode_trxtype='$kode_trxtype' AND tgl_create='$tgl_create'";
$sql = $koneksi_master->query("$sqltext");



?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka);?>";
</script>