<?php
include "koneksi.php";

$kode_user        = $_POST['kode_user'];
$username         = $_POST['username'];
$password         = $_POST['password'];
$nik              = $_POST['nik'];
$level            = $_POST['level'];

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE nik='$nik'");
$tampil = $sql->fetch_assoc();

$nama_karyawan            = $tampil['nama_karyawan'];

$simpan           = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("UPDATE pb_role.tb_user set nik='$nik', username='$username',password='$password',nama=upper('$nama_karyawan'),level=upper('$level') where kode_user='$kode_user'");

    // echo "UPDATE pb_role.tb_user set nik='$nik', username='$username',password='$password',nama='$nama_karyawan',level=upper('$level') where kode_user='$kode_user'";

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=user";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=user&aksi=ubah";
        </script>
<?php
    }
}

?>