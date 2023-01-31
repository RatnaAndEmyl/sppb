<?php
include "koneksi.php";

$kode_trxtype          = $_POST['kode_trxtype'];
$deskripsi                 = $_POST['deskripsi'];
$flag_inputan                 = $_POST['flag_inputan'];
// $flag_ceklis                 = $_POST['flag_ceklis'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_trxtype set deskripsi=upper('$deskripsi'),flag_inputan='$flag_inputan', update_by='$kode_user' where kode_trxtype='$kode_trxtype'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=trxtype";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=trxtype&aksi=ubah";
        </script>
<?php
    }
}

?>