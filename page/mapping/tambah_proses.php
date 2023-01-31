<?php
include '..\..\koneksi.php';


$kode_subkategori    = $_POST['kode_subkategori'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_mapping_master values(null,upper('$kode_subkategori'),'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=mapping";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping&aksi=tambah";
        </script>
<?php
    }
}

?>