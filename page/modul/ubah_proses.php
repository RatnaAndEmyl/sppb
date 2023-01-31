<?php
include "koneksi.php";

$kode_modul       = $_POST['kode_modul'];
$nama_modul     = $_POST['nama_modul'];
$simpan                = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("update pb_role.tb_modul set  nama_modul=upper('$nama_modul'),  update_by='$kode_user' where kode_modul='$kode_modul'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=modul";
        </script>
<?php
    }
}

?>