<?php
// usersubmodul.php
include "..\\..\\koneksi.php";

$kode_gudang = $_POST["kode_gudang"]; //mengambil kode_gudang punya kombo box jenis barang

echo "<option value='' selected disabled>-- Pilih Nama --</option>"; 

$sql = $koneksi_master->query("SELECT DISTINCT a.kode_suplier, b.nama_suplier FROM pb_transaksi.tb_po a INNER JOIN pb_master.tb_suplier b  ON a.kode_suplier=b.kode_suplier WHERE a.STATUS='A' AND b.STATUS='A' AND a.kode_gudang='$kode_gudang' and a.status_po='Y' ORDER BY a.kode_po"); 
// Perintah SELECT DISTINCT digunakan untuk mengambil data-data yang berbeda pada suatu record. Di dalam tabel, field sering kali berisi banyak nilai duplikat dan terkadang kita hanya ingin membuat daftar nilai yang berbeda.

while ($databarang = $sql->fetch_assoc()) { ?>

<?php echo $databarang["nama_suplier"]; ?>

<option value="<?php echo $databarang["kode_suplier"] ?>"><?php echo $databarang["nama_suplier"] ?></option><br>

<?php } ?>

