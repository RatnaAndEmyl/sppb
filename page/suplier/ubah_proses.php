<?php
include "koneksi.php";

$kode_suplier   = $_POST['kode_suplier'];
$nama_suplier   = $_POST['nama_suplier'];
$no_hp_suplier  = $_POST['no_hp_suplier'];
$simpan         = $_POST['simpan'];
if ($simpan) {
 
    $test = "UPDATE pb_master.tb_suplier set nama_suplier=upper('$nama_suplier'), no_hp_suplier='$no_hp_suplier', update_by='$kode_user' where kode_suplier='$kode_suplier'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=suplier";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=suplier&aksi=ubah";
        </script>
<?php
    }
}

?>