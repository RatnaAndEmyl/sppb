<?php
include '..\..\koneksi.php';

$tanggal              = $_POST['tanggal'];
$kode_permintaan      = $_POST['kode_permintaan'];
$kode_gudang          = $_POST['kode_gudang'];

// $kode_jabatan         = $_POST['kode_jabatan'];

$simpan               = $_POST['simpan'];

if ($simpan) {

    $sqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $data_jabatan = $sqljabatan->fetch_assoc();
    
    $sqltext = "INSERT INTO pb_transaksi.tb_permintaan values(null,'$tanggal','$nama','$nik_login','$kode_user','$kode_jabatan', '$jabatan', '$kode_gudang','A','A',null,'$kode_user',null,null,null,null)";

    $sql = $koneksi_master->query($sqltext);

    $sql_cari_kode_permintaan = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_permintaan WHERE status='A' and nik='$nik_login' and username='$nama' and jabatan='$jabatan' and tanggal='$tanggal' and kode_gudang='$kode_gudang' order by kode_permintaan desc"); /*kita mencari tau kode_permintaan yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/ 
    
    $data_cari_kode_permintaan = $sql_cari_kode_permintaan->fetch_assoc(); 

    $kode_permintaan = $data_cari_kode_permintaan['kode_permintaan'];

    if ($sql) {
?>


<script type="text/javascript">
  alert("Data Berhasil Disimpan")
  window.location.href = "?page=permintaan&aksi=tambah_barang&kode_permintaan=<?php echo $kode_permintaan; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_permintaan . $angka); ?>";

</script>

<?php
    } else { ?>
<script type="text/javascript">
  alert("Data Gagal Disimpan");
  window.location.href = "?page=permintaan&aksi=tambah";

</script>
<?php
    }
}

?>
