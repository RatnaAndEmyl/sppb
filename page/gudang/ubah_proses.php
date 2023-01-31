<?php
include "koneksi.php";

$kode_gudang   = $_POST['kode_gudang'];
$nama_gudang = $_POST['nama_gudang'];
$alamat_gudang = $_POST['alamat_gudang'];

$simpan      = $_POST['simpan'];
if ($simpan) {
 
    $test = "UPDATE pb_master.tb_gudang set nama_gudang=upper('$nama_gudang'),alamat_gudang=upper('$alamat_gudang'), update_by='$kode_user' where kode_gudang='$kode_gudang'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=gudang";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=gudang&aksi=ubah";
        </script>
<?php
    }
}

?>