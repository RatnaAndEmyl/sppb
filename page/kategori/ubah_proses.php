<?php
include "koneksi.php";

$kode_kategori          = $_POST['kode_kategori'];
$deskripsi_kategori                   = $_POST['deskripsi_kategori'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_kategori set  deskripsi_kategori=upper('$deskripsi_kategori'), update_by='$kode_user' where kode_kategori='$kode_kategori'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=kategori";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=kategori&aksi=ubah";
        </script>
<?php
    }
}

?>