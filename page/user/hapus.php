<?php

$kode_user = $_GET['kode_user'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_user . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("update pb_role.tb_user set status ='N' where kode_user='$kode_user'");


?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=user";
</script>