<?php 
include "koneksi.php";

$kode_departemen        = $_POST['kode_departemen'];
$kode_subdepartemen     = $_POST['kode_subdepartemen'];
$nama_departemen        = $_POST['nama_departemen'];
$nama_subdepartemen     = $_POST['nama_subdepartemen'];
$simpan                 = $_POST['simpan'];
if ($simpan) {


    $sql = $koneksi_master->query("UPDATE pb_master.tb_subdepartemen_karyawan set kode_departemen=upper('$kode_departemen'), nama_subdepartemen=upper('$nama_subdepartemen'), update_by='$kode_user' where kode_subdepartemen='$kode_subdepartemen'");

    if ($sql) {
        ?>
<script type="text/javascript">
alert("Data Berhasil Diubah")
window.location.href = "?page=subdepartemen";
</script>
<?php
    }
}

 ?>