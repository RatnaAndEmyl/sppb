<?php
include '..\..\koneksi.php';

$tanggal_adjustment       = $_POST['tanggal_adjustment'];
$username                 = $_POST['username'];
$jabatan                  = $_POST['jabatan'];
$kode_adjustment          = $_POST['kode_adjustment'];
$kode_gudang              = $_POST['kode_gudang'];

// untuk upload file 
$images = $_FILES['file']['name'];
if ($_FILES['file']['name'] <> null) {
    $images = date("Ymdhis") .' '. $images; //berikan spasi antara nama file dengan tanggal uploadnya
}
$lokasi = $_FILES['file']['tmp_name'];
$upload = move_uploaded_file($lokasi, "dist/img_adjustment/" . $images);

$simpan               = $_POST['simpan'];
// echo $kode_adjustment;
if ($simpan) {

  // $kode_user = $_SESSION['s_kode_user'];

  $sqljabatan = $koneksi_master->query("SELECT b.kode_jabatan, a.nik, b.nama_karyawan, c.jabatan FROM pb_role.tb_user a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan WHERE a.status='A' AND b.status='A' AND c.status='A' AND b.nama_karyawan='$username'");
  $data_jabatan = $sqljabatan->fetch_assoc();

  $kode_jabatan = $data_jabatan['kode_jabatan'];
  $jabatan = $data_jabatan['jabatan'];
  $nik = $data_jabatan['nik'];
  $nama_karyawan = $data_jabatan['nama_karyawan'];

  // echo $nik. '<br>';


  $sqltext = "INSERT INTO pb_transaksi.tb_adjustment values(null,'$tanggal_adjustment',upper('$username'),'$nik','$kode_jabatan', '$jabatan', '$kode_gudang','$images','A','A',null,'$kode_user',null,null,null,null)";
 $sql = $koneksi_master->query($sqltext);
//  echo $sqltext. '<br>';


  $sql_cari_kode_adjustment = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_adjustment WHERE status='A' AND nik='$nik' AND username='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_adjustment='$tanggal_adjustment' AND kode_gudang='$kode_gudang' ORDER BY kode_adjustment desc"); /*kita mencari tau kode_adjustment yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/
  $data_cari_kode_adjustment = $sql_cari_kode_adjustment->fetch_assoc();
  $kode_adjustment = $data_cari_kode_adjustment['kode_adjustment'];

  // echo 'kode adjustment' . $kode_adjustment . '<br>';


  // echo "SELECT * FROM pb_transaksi.tb_adjustment WHERE status='A' AND nik='$nik' AND username='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_adjustment='$tanggal_adjustment' AND kode_gudang='$kode_gudang' ORDER BY kode_adjustment desc";


  if ($sql) {
?>


    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
     window.location.href = "?page=adjustment&aksi=tambah_adjustment&kode_adjustment=<?php echo $kode_adjustment; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_adjustment . $angka); ?>";
    </script>

  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=adjustment&aksi=tambah";
    </script>
<?php
  }
}

?>