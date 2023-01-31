<?php

$kode_departemen = $_GET['kode_departemen'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_departemen . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("UPDATE pb_master.tb_departemen_karyawan set status ='N', update_by='$kode_user' where kode_departemen='$kode_departemen'");


?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=departemen";
</script>