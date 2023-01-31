<?php
include "koneksi.php";

$id_jenis_barang   = $_POST['id_jenis_barang'];
$nama_jenis_barang = $_POST['nama_jenis_barang'];
$simpan            = $_POST['simpan'];
if ($simpan) {
 
    $test = "UPDATE pb_master.tb_jenis_barang set nama_jenis_barang=upper('$nama_jenis_barang'), update_by='$kode_user' where id_jenis_barang='$id_jenis_barang'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=jenis_barang";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=jenis_barang&aksi=ubah";
        </script>
<?php
    }
}

?>