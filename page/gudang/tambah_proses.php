<?php
include '..\..\koneksi.php';

$nama_gudang        = $_POST['nama_gudang'];
$alamat_gudang       = $_POST['alamat_gudang'];

$simpan             = $_POST['simpan'];

if ($simpan) {

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_gudang values(null,upper('$nama_gudang'),upper('$alamat_gudang'),'A',null,'$kode_user',null,null,null,null)");
    if ($sql) {
?>


        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=gudang";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=gudang&aksi=tambah";
        </script>
<?php
    }
}

?>