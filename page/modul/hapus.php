<?php

$kode_modul = $_GET['kode_modul'];



$sql = $koneksi_master->query("UPDATE pb_role.tb_modul set status ='N', update_by='$kode_user' where kode_modul='$kode_modul'");


?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=modul";
</script>