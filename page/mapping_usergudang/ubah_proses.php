<?php
include "koneksi.php";

$kode_mapping_usergudang          = $_POST['kode_mapping_usergudang'];
$kode_gudang                   = $_POST['kode_gudang'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_mapping_usergudang set  kode_gudang='$kode_gudang', update_by='$kode_user' where kode_mapping_usergudang='$kode_mapping_usergudang'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=mapping_usergudang";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping_usergudang&aksi=ubah";
        </script>
<?php
    }
}

?>