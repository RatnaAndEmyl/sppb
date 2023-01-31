<?php
include '..\..\koneksi.php';

$deskripsi_kategori    = $_POST['deskripsi_kategori'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_kategori values(null,upper('$deskripsi_kategori'),'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=kategori";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=kategori&aksi=tambah";
        </script>
<?php
    }
}

?>