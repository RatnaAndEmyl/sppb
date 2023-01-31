<?php
include '..\..\koneksi.php';

$nama_modul    = $_POST['nama_modul'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("insert into pb_role.tb_modul values(null,upper('$nama_modul'),'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=modul";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=modul&aksi=tambah";
        </script>
<?php
    }
}

?>