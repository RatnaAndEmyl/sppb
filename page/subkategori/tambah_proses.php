<?php
include '..\..\koneksi.php';

$kode_kategori    = $_POST['kode_kategori'];
$deskripsi_subkategori    = $_POST['deskripsi_subkategori'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_subkategori values(null,'$kode_kategori',upper('$deskripsi_subkategori'),'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=subkategori";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=subkategori&aksi=tambah";
        </script>
<?php
    }
}

?>