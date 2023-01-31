<?php
// usersubmodul.php
include "..\\..\\koneksi.php";

$id_jenis_barang = $_POST["id_jenis_barang"]; //mengambil id_jenis_barang punya kombo box jenis barang
$kode_sppb = $_POST["kode_sppb"]; 

echo "<option value='' selected disabled>-- Pilih Barang --</option>";

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_barang  a INNER JOIN pb_master.tb_satuan c ON a.kode_satuan=c.kode_satuan WHERE a.STATUS='A' AND id_jenis_barang='$id_jenis_barang' and not exists (SELECT b.kode_barang FROM pb_transaksi.tb_sppb_detail b WHERE b.kode_barang=a.id_barang AND b.status='A' AND b.kode_sppb='$kode_sppb') ORDER BY a.nama_barang ASC");

while ($databarang = $sql->fetch_assoc()) {

?>

<option value="<?php echo $databarang["id_barang"] ?>"><?php echo $databarang["nama_barang"] ?> (<?php echo $databarang["nama_satuan"] ?>)</option><br>

<?php
}
?>

