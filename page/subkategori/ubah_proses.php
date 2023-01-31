<?php
include "koneksi.php";

$kode_subkategori          = $_POST['kode_subkategori'];
$kode_kategori          = $_POST['kode_kategori'];
$deskripsi_subkategori                   = $_POST['deskripsi_subkategori'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_subkategori set  kode_kategori='$kode_kategori',deskripsi_subkategori=upper('$deskripsi_subkategori'), update_by='$kode_user' where kode_subkategori='$kode_subkategori'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=subkategori";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=subkategori&aksi=ubah";
        </script>
<?php
    }
}

?>