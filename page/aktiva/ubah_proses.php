<?php
include "koneksi.php";

$kode_aktiva          = $_POST['kode_aktiva'];
$kode_kategori          = $_POST['kode_kategori'];
$kode_subkategori          = $_POST['kode_subkategori'];
$deskripsi_aktiva                   = $_POST['deskripsi_aktiva'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_transaksi.tb_aktiva set kode_kategori='$kode_kategori', kode_subkategori='$kode_subkategori', deskripsi_aktiva=upper('$deskripsi_aktiva'), update_by='$kode_user' where kode_aktiva='$kode_aktiva'");
    
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=aktiva";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=aktiva&aksi=ubah";
        </script>
<?php
    }
}

?>