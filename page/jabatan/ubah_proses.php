<?php
include "koneksi.php";

$kode_jabatan       = $_POST['kode_jabatan'];
$jabatan     = $_POST['jabatan'];
$manajerial     = $_POST['manajerial'];
$simpan                = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("UPDATE pb_master.tb_jabatan_karyawan set  jabatan=upper('$jabatan'), manajerial=upper('$manajerial'), update_by='$kode_user' where kode_jabatan='$kode_jabatan'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=jabatan";
        </script>
<?php
    }
}

?>