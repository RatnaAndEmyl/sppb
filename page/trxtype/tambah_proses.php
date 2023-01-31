<?php
include '..\..\koneksi.php';

$deskripsi   = $_POST['deskripsi'];
$flag_inputan   = $_POST['flag_inputan'];
// $flag_ceklis   = $_POST['flag_ceklis'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_trxtype values(null,UPPER('$deskripsi'),'$flag_inputan',null,'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=trxtype";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=trxtype&aksi=tambah";
        </script>
<?php
    }
}

?>