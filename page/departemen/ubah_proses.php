<?php
include "koneksi.php";

$kode_departemen    = $_POST['kode_departemen'];
$nama_departemen    = $_POST['nama_departemen'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("update pb_master.tb_departemen_karyawan set nama_departemen='$nama_departemen', update_by='$kode_user' where kode_departemen='$kode_departemen'");

    if ($sql) {
?>
<script type="text/javascript">
alert("Data Berhasil Diubah")
window.location.href = "?page=departemen";
</script>
<?php
    }
}

?>