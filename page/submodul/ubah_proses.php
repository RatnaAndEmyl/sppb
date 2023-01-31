<?php 
include "koneksi.php";

$kode_submodul              = $_POST ['kode_submodul'];
$kode_modul                 = $_POST ['kode_modul'];
$nama_submodul              = $_POST ['nama_submodul'];
$jenis                      = $_POST ['jenis'];
$link                       = addslashes($_POST ['link']);
$simpan                     = $_POST ['simpan'];
if ($simpan) {
// SELECT `kode_submodul`, `kode_modul`, `nama_submodul`, `jenis`, `link`, `website`, `status`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_submodul` WHERE 1

    $test = "UPDATE pb_role.tb_submodul set kode_modul=upper('$kode_modul'), nama_submodul=upper('$nama_submodul'), jenis='$jenis', link='$link', update_by='$kode_user' where kode_submodul='$kode_submodul'" ;
    $sql = $koneksi_master->query($test);

    echo $test;
  
    if ($sql) {
        ?>
<script type="text/javascript">
alert("Data Berhasil Diubah")
window.location.href = "?page=submodul";
</script>
<?php
    }
}

 ?>