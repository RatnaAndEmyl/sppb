<?php
include "koneksi.php";

$id_barang   = $_POST['id_barang'];
$kode_satuan = $_POST['kode_satuan'];
$nama_barang = $_POST['nama_barang'];
// $harga_barang = $_POST['harga_barang'];
$detail = $_POST['detail'];
// $stok_barang = $_POST['stok_barang'];
$onhandstok = $_POST['onhandstok'];
$simpan      = $_POST['simpan'];
if ($simpan) {
 
    $test = "UPDATE pb_master.tb_barang set kode_satuan='$kode_satuan', nama_barang=upper('$nama_barang'), detail=upper('$detail'), onhandstok='$onhandstok', update_by='$kode_user' where id_barang='$id_barang'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=barang";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=barang&aksi=ubah";
        </script>
<?php
    }
}

?>