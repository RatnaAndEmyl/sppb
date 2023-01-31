<?php
// usersubmodul.php
include "..\\..\\koneksi.php";

$kode_kategori = $_POST["kode_kategori"]; //mengambil kode_kategori punya kombo box jenis subkategori


echo "<option value='' selected disabled>-- Pilih subkategori --</option>";
// $sql = $koneksi_master->query("SELECT * from pb_master.tb_subkategori where kode_kategori='$kode_kategori'WHERE pb_master.tb_subkategori.STATUS='A'ORDER BY a.kode_kategori");


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subkategori a
 WHERE a.STATUS='A' AND kode_kategori='$kode_kategori' 
  ORDER BY a.kode_subkategori");

while ($datasubkategori = $sql->fetch_assoc()) {

?>
<option value="<?php echo $datasubkategori["kode_subkategori"] ?>"><?php echo $datasubkategori["deskripsi_subkategori"] ?></option><br>

<?php
}
?>