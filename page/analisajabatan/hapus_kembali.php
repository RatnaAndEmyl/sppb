<?php
    $angka = date('Ymdhis');
$kode_analisa_jabatan            = $_GET['kode_analisa_jabatan'];
$kode_departemen             = $_GET['kode_departemen'];
$kode_subdepartemen         = $_GET['kode_subdepartemen'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_analisa_jabatan . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("update hr_master.tb_analisa_jabatan set status ='A', update_by='$nik' where kode_analisa_jabatan='$kode_analisa_jabatan'");


?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href ="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>"
</script>