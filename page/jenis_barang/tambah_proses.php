<?php
include '..\..\koneksi.php';

$nama_jenis_barang             = $_POST['nama_jenis_barang'];
$simpan                 = $_POST['simpan'];

if ($simpan) {

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_jenis_barang values(null,upper('$nama_jenis_barang'),'A',null,'$kode_user',null,null,null,null)");
    if ($sql) {
?>


        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=jenis_barang";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=jenis_barang&aksi=tambah";
        </script>
<?php
    }
}

?>