<?php
include '..\..\koneksi.php';

$tanggal_sppb          = $_POST['tanggal_sppb'];
$kode_sppb            = $_POST['kode_sppb'];
$kode_gudang          = $_POST['kode_gudang'];

// $kode_jabatan         = $_POST['kode_jabatan'];

$simpan               = $_POST['simpan'];

if ($simpan) {

    $sqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $data_jabatan = $sqljabatan->fetch_assoc();
    
    $sqltext = "INSERT INTO pb_transaksi.tb_sppb values(null,'$tanggal_sppb','$nama','$nik_login','$kode_user','$kode_jabatan', '$jabatan', '$kode_gudang','A','A',null,'$kode_user',null,null,null,null)";

    $sql = $koneksi_master->query($sqltext);

    $sql_cari_kode_sppb = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_sppb WHERE status='A' and nik='$nik_login' and username='$nama' and jabatan='$jabatan' and tanggal_sppb='$tanggal_sppb' and kode_gudang='$kode_gudang' order by kode_sppb desc"); /*kita mencari tau kode_sppb yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/ 
    
    $data_cari_kode_sppb = $sql_cari_kode_sppb->fetch_assoc(); 

    $kode_sppb = $data_cari_kode_sppb['kode_sppb'];

    if ($sql) {
?>


<script type="text/javascript">
  alert("Data Berhasil Disimpan")
  window.location.href = "?page=sppb&aksi=tambah_sppb&kode_sppb=<?php echo $kode_sppb; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_sppb . $angka); ?>";

</script>

<?php
    } else { ?>
<script type="text/javascript">
  alert("Data Gagal Disimpan");
  window.location.href = "?page=sppb&aksi=tambah";

</script>
<?php
    }
}

?>
