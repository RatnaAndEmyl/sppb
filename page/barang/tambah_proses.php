<?php
include '..\..\koneksi.php';

$id_jenis_barang    = $_POST['id_jenis_barang'];
$kode_satuan        = $_POST['kode_satuan'];
$nama_barang        = $_POST['nama_barang'];
$detail             = $_POST['detail'];
$onhandstok        = $_POST['onhandstok'];
// $stok_barang        = $_POST['stok_barang'];
$simpan             = $_POST['simpan'];

if ($simpan) {

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_barang values(null,'$id_jenis_barang','$kode_satuan', upper('$nama_barang'),upper('$detail'),'$onhandstok','A',null,'$kode_user',null,null,null,null)");
    if ($sql) {
?>


        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=barang";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=barang&aksi=tambah";
        </script>
<?php
    }
}

?>