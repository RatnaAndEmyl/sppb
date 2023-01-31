<?php
include "koneksi.php";


$kode_trxtype          = $_POST['kode_trxtype'];
$deskripsi_subtrxtype  = $_POST['deskripsi_subtrxtype'];
$simpan                = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_subtrxtype set  kode_trxtype='$kode_trxtype',deskripsi_subtrxtype='$deskripsi_subtrxtype', update_by='$kode_user' where kode_trxtype='$kode_trxtype'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=subtrxtype";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=subtrxtype&aksi=ubah";
        </script>
<?php
    }
}

?>