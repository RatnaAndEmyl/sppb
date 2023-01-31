<?php
include "koneksi.php";

$kode_mapping          = $_POST['kode_mapping'];
$kode_subkategori                   = $_POST['kode_subkategori'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_mapping_master set  kode_subkategori='$kode_subkategori', update_by='$kode_user' where kode_mapping='$kode_mapping'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=mapping";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping&aksi=ubah";
        </script>
<?php
    }
}

?>