<?php
// usersubmodul.php
include "..\\..\\koneksi.php";

$kode_departemen = $_POST["kode_departemen"]; //mengambil kode_departemen punya kombo box jenis barang
$kode_karyawan = $_POST["kode_karyawan"];

echo "<option value='' selected disabled>-- Pilih Sub Departemen --</option>";

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subdepartemen_karyawan WHERE STATUS='A' AND kode_departemen='$kode_departemen' ORDER BY kode_departemen");


while ($databarang = $sql->fetch_assoc()) { ?>

    <option value="<?php echo $databarang["kode_subdepartemen"] ?>"><?php echo $databarang["nama_subdepartemen"] ?></option><br>

<?php } ?>