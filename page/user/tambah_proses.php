<?php
include '..\..\koneksi.php';

$username            = $_POST['username'];
$password            = $_POST['password'];
$nik                 = $_POST['nik'];
$level               = $_POST['level'];

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE nik='$nik'");
$tampil = $sql->fetch_assoc();

$nama_karyawan            = $tampil['nama_karyawan'];
$kode_departemen          = $tampil['kode_departemen'];
$kode_subdepartemen       = $tampil['kode_subdepartemen'];

$simpan              = $_POST['simpan'];


if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_role.tb_user VALUES(null,'$nik','$username','$password',upper('$nama_karyawan'),'$kode_departemen','$kode_subdepartemen',null,upper('$level'),'A',null)");

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
            window.location.href = "?page=user&aksi=tambah";
        </script>
<?php
    }
}

?>