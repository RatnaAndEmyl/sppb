<?php
include '..\..\koneksi.php';

$tanggal_bbk              = $_POST['tanggal_bbk'];
$kode_bbk                 = $_POST['kode_bbk'];
$kode_gudang              = $_POST['kode_gudang'];
$nik                      = $_POST['nik'];
// $kode_user              = $_POST['kode_user'];
// echo $tanggal_bbk. '<br>';
// $kode_jabatan         = $_POST['kode_jabatan'];

$simpan               = $_POST['simpan'];
// echo $kode_bbk;
// echo $tanggal_bbk. '<br>';
// echo $kode_gudang. '<br>';
// echo $nik. '<br>';
// echo $kode_bbk. '<br>';
if ($simpan) {

  // $kode_user = $_SESSION['s_kode_user'];

  $sqljabatan = $koneksi_master->query("SELECT b.kode_jabatan, a.nik, b.nama_karyawan, c.jabatan FROM pb_role.tb_user a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan WHERE a.status='A' AND b.status='A' AND c.status='A' AND a.nik='$nik'");
  $data_jabatan = $sqljabatan->fetch_assoc();

  $kode_jabatan = $data_jabatan['kode_jabatan'];
  $jabatan = $data_jabatan['jabatan'];
  $nik = $data_jabatan['nik'];
  $nama_karyawan = $data_jabatan['nama_karyawan'];


  $sqltext = "INSERT INTO pb_transaksi.tb_bbk values(null,'$tanggal_bbk',upper('$nama_karyawan'),'$nik','$kode_jabatan', '$jabatan', '$kode_gudang','A','A',null,'$kode_user',null,null,null,null)";
 $sql = $koneksi_master->query($sqltext);
//  echo $sqltext. '<br>';


  $sql_cari_kode_bbk = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk WHERE status='A' AND nik='$nik' AND pemohon='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_bbk='$tanggal_bbk' AND kode_gudang='$kode_gudang' ORDER BY kode_bbk desc"); /*kita mencari tau kode_bbk yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/
  $data_cari_kode_bbk = $sql_cari_kode_bbk->fetch_assoc();
  $kode_bbk = $data_cari_kode_bbk['kode_bbk'];

  // echo $kode_bbk. '<br>';
  // echo $data_cari_kode_bbk. '<br>';

  // echo "SELECT * FROM pb_transaksi.tb_bbk WHERE status='A' AND nik='$nik' AND pemohon='$nama_karyawan' AND jabatan='$jabatan' AND tanggal_bbk='$tanggal_bbk' AND kode_gudang='$kode_gudang' ORDER BY kode_bbk desc";


  if ($sql) {
?>


    <script type="text/javascript">
      alert("Data Berhasil Disimpan")
     window.location.href = "?page=bbk&aksi=tambah_bbk&kode_bbk=<?php echo $kode_bbk; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_bbk . $angka); ?>";
    </script>

  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
      window.location.href = "?page=bbk&aksi=tambah";
    </script>
<?php
  }
}

?>