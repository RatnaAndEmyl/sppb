<?php
include '..\..\koneksi.php';

$jabatan    = $_POST['jabatan'];
$manajerial    = $_POST['manajerial'];
$simpan             = $_POST['simpan'];

// echo $jabatan;
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_jabatan_karyawan values(null,upper('$jabatan'),upper('$manajerial'),'A',null,'$kode_user',null,null,null,null)");


    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=jabatan";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=jabatan&aksi=tambah";
        </script>
<?php
    }
}

?>