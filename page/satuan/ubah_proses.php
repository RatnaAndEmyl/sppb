<?php
include "koneksi.php";

$kode_satuan = $_POST['kode_satuan'];
$nama_satuan = $_POST['nama_satuan'];

$simpan      = $_POST['simpan'];
if ($simpan) {

    $test = "UPDATE pb_master.tb_satuan set nama_satuan=upper('$nama_satuan'), update_by='$kode_user' where kode_satuan='$kode_satuan'";
    $sql = $koneksi_master->query($test);

    echo $sql;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=satuan";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=satuan&aksi=ubah";
        </script>
<?php
    }
}

?>