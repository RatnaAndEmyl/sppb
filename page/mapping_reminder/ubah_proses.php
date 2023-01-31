<?php
include "koneksi.php";

$kode_mapping_reminder          = $_POST['kode_mapping_reminder'];
$kode_trxtype                   = $_POST['kode_trxtype'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_mapping_reminder set  kode_trxtype='$kode_trxtype', update_by='$kode_user' where kode_mapping_reminder='$kode_mapping_reminder'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=mapping_reminder";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping_reminder&aksi=ubah";
        </script>
<?php
    }
}

?>