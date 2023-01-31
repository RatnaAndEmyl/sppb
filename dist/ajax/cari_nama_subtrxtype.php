<?php
// usersubmodul.php
include "..\\..\\koneksi.php";

$kode_kategori = $_POST["kode_kategori"]; //mengambil kode_kategori punya kombo box jenis subkategori


echo "<option value='' selected disabled>-- Pilih subkategori --</option>";
// $sql = $koneksi_master->query("SELECT * from pb_master.tb_subkategori where kode_kategori='$kode_kategori'WHERE pb_master.tb_subkategori.STATUS='A'ORDER BY a.kode_kategori");


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subkategori a
 WHERE a.STATUS='A' AND kode_kategori='$kode_kategori' and not exists 
 (SELECT b.kode_subkategori FROM pb_transaksi.tb_aktiva b WHERE b.kode_subkategori=a.kode_subkategori AND b.status='A') ORDER BY a.kode_subkategori");

while ($datasubkategori = $sql->fetch_assoc()) {

?>
<option value="<?php echo $datasubkategori["kode_subkategori"] ?>"><?php echo $datasubkategori["deskripsi_subkategori"] ?></option><br>

<?php
}
?>