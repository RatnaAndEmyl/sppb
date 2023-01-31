<?php

$kode_pembelian          = $_GET['kode_pembelian'];
$id_barang               = $_GET['id_barang'];
$id_jenis_barang         = $_GET['id_jenis_barang'];
$jumlah_pembelian        = $_GET['jumlah_pembelian'];
$harga_satuan            = $_GET['harga_satuan'];
// $satuan                  = $_GET['satuan'];
$total_harga             = $_GET['total_harga'];
$kode_suplier            = $_GET['kode_suplier'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_pembelian . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_transaksi.tb_pembelian set status ='N', update_by='$kode_user' where kode_pembelian='$kode_pembelian'");

?>

<script type="text/javascript">
alert("Data Berhasil Dihapus")
window.location.href = "?page=pembelian";
</script>