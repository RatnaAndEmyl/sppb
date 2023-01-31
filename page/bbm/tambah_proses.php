<?php
include '..\..\koneksi.php';

$tanggal_bbm              = $_POST['tanggal_bbm'];
$username                 = $_POST['username'];
$jabatan                  = $_POST['jabatan'];
$kode_bbm                 = $_POST['kode_bbm'];
$kode_gudang              = $_POST['kode_gudang'];
$kode_suplier             = $_POST['kode_suplier'];
// $kode_user              = $_POST['kode_user'];
// echo $tanggal_bbm. '<br>';
// $kode_jabatan         = $_POST['kode_jabatan'];

$simpan               = $_POST['simpan'];
// echo $kode_bbm;
if ($simpan) {

  // $kode_user = $_SESSION['s_kode_user'];

  $sqljabatan = $koneksi_master->query("SELECT b.kode_jabatan, a.nik, b.nama_karyawan, c.jabatan FROM pb_role.tb_user a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan WHERE a.status='A' AND b.status='A' AND c.status='A' AND b.nama_karyawan='$username'");
  $data_jabatan = $sqljabatan->fetch_assoc();

  $kode_jabatan = $data_jabatan['kode_jabatan'];
  $jabatan = $data_jabatan['jabatan'];
  $nik = $data_jabatan['nik'];
  $nama_karyawan = $data_jabatan['nama_karyawan'];

  // echo $nik. '<br>';


  $sqltext = "INSERT INTO pb_transaksi.tb_bbm values(null,'$tanggal_bbm',upper('$username'),'$nik','$kode_jabatan', '$jabatan', '$kode_gudang','$kode_suplier','A','A',null,'$kode_user',null,null,null,null)";
 $sql = $koneksi_master->query($sqltext);
//  echo $sqltext. '<br>';


  $sql_cari_kode_bbm = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbm WHERE status='A' AND nik='$nik' AND username='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_bbm='$tanggal_bbm' AND kode_gudang='$kode_gudang' ORDER BY kode_bbm desc"); /*kita mencari tau kode_bbm yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/
  $data_cari_kode_bbm = $sql_cari_kode_bbm->fetch_assoc();
  $kode_bbm = $data_cari_kode_bbm['kode_bbm'];

  // echo 'kode bbm' . $kode_bbm . '<br>';


  // echo "SELECT * FROM pb_transaksi.tb_bbm WHERE status='A' AND nik='$nik' AND username='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_bbm='$tanggal_bbm' AND kode_gudang='$kode_gudang' ORDER BY kode_bbm desc";


  if ($sql) {
?>


    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
     window.location.href = "?page=bbm&aksi=tambah_bbm&kode_bbm=<?php echo $kode_bbm; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbm . $angka); ?>";
    </script>

  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=bbm&aksi=tambah";
    </script>
<?php
  }
}

?>