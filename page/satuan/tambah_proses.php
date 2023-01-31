<?php
include '..\..\koneksi.php';

$nama_satuan    = $_POST['nama_satuan'];

$simpan             = $_POST['simpan'];

if ($simpan) {

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_satuan values(null, upper('$nama_satuan'),'A',null,'$kode_user',null,null,null,null)");
    if ($sql) {
?>


        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=satuan";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=satuan&aksi=tambah";
        </script>
<?php
    }
}

?>