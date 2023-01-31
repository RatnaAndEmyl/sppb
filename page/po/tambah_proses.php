<?php
include '..\..\koneksi.php';

$tanggal_po              = $_POST['tanggal_po'];
$kode_po                 = $_POST['kode_po'];
$kode_gudang             = $_POST['kode_gudang'];
$kode_suplier            = $_POST['kode_suplier'];

// $kode_jabatan         = $_POST['kode_jabatan'];

$simpan               = $_POST['simpan'];

if ($simpan) {

    $sqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $data_jabatan = $sqljabatan->fetch_assoc();
    
    $sqltext = "INSERT INTO pb_transaksi.tb_po values(null,'$tanggal_po','$nama','$nik_login','$kode_user','$kode_jabatan', '$jabatan', '$kode_gudang', '$kode_suplier','A','A',null,'$kode_user',null,null,null,null)";

    $sql = $koneksi_master->query($sqltext);

    $sql_cari_kode_po = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_po WHERE status='A' AND nik='$nik_login' AND username='$nama' AND jabatan='$jabatan' AND tanggal_po='$tanggal_po' AND kode_gudang='$kode_gudang' AND kode_suplier='$kode_suplier'  ORDER BY kode_po DESC"); /*kita mencari tau kode_po yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/ 
    
    $data_cari_kode_po = $sql_cari_kode_po->fetch_assoc(); 

    $kode_po = $data_cari_kode_po['kode_po'];

    if ($sql) {
?>


<script type="text/javascript">
  alert("Data Berhasil Disimpan")
  window.location.href = "?page=po&aksi=tambah_po&kode_po=<?php echo $kode_po; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_po . $angka); ?>";

</script>

<?php
    } else { ?>
<script type="text/javascript">
  alert("Data Gagal Disimpan");
  window.location.href = "?page=po&aksi=tambah";

</script>
<?php
    }
}

?>
