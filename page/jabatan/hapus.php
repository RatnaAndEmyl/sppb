<?php

$kode_jabatan = $_GET['kode_jabatan'];



$sql = $koneksi_master->query("UPDATE pb_master.tb_jabatan_karyawan set status ='N', update_by='$kode_user' where kode_jabatan='$kode_jabatan'");


?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=jabatan";
</script>