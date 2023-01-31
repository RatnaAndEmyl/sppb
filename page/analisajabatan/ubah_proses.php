<?php
include "koneksi.php";
    $angka = date('Ymdhis');
$kode_analisa_jabatan            = $_POST['kode_analisa_jabatan'];
$kode_jabatan            = $_POST['kode_jabatan'];
$kode_departemen             = $_POST['kode_departemen'];
$kode_subdepartemen         = $_POST['kode_subdepartemen'];
$kode_golongan          = $_POST['kode_golongan'];

$simpan                = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("update hr_master.tb_analisa_jabatan set kode_golongan='$kode_golongan', update_by='$nik'  where kode_analisa_jabatan='$kode_analisa_jabatan'");

    if ($sql) {
?>
        <script type="text/javascript">
            //alert("Data Berhasil Diubah")
            window.location.href ="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>"
        </script>
<?php
    }
}

?>