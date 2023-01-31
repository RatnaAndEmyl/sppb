<?php
include '..\..\koneksi.php';

$nama_departemen = $_POST['nama_departemen'];
$simpan          = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_departemen_karyawan values(null,upper('$nama_departemen'),null,'$kode_user',null,null,null,null,'A')");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=departemen";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=departemen&aksi=tambah";
        </script>
<?php
    }
}


?>