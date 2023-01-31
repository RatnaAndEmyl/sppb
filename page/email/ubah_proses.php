<?php
include "koneksi.php";

$kode_email          = $_POST['kode_email'];
$pengguna                 = $_POST['pengguna'];
$email                 = $_POST['email'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
        $sql = $koneksi_master->query("UPDATE pb_master.tb_email set pengguna=upper('$pengguna'),email='$email', update_by='$kode_user' where kode_email='$kode_email'");
    
        if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=email";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=email&aksi=ubah";
        </script>
<?php
    }
}

?>