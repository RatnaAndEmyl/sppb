<?php
include "koneksi.php";

$nik                = $_POST['nik'];
$nama_karyawan      = $_POST['nama_karyawan'];
$jk                 = $_POST['jk'];
$alamat             = $_POST['alamat'];
$agama              = $_POST['agama'];
$kode_jabatan       = $_POST['kode_jabatan'];
$kode_departemen    = $_POST['kode_departemen'];
$kode_subdepartemen = $_POST['kode_subdepartemen'];
$nik_ktp            = $_POST['nik_ktp'];
$simpan             = $_POST['simpan'];

if ($simpan) {


    // SELECT `nik`, `nama_karyawan`, `jk`, `alamat`, `agama`, `kode_jabatan`, `kode_departemen`, `kode_subdepartemen`, `nik_ktp`, `status`, `tgl_masuk`, `tgl_keluar`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_karyawan` WHERE 1

    $sql = $koneksi_master->query("UPDATE pb_master.tb_karyawan set nama_karyawan=upper('$nama_karyawan'),jk='$jk',alamat=upper('$alamat'),agama=upper('$agama'),kode_jabatan='$kode_jabatan',kode_departemen='$kode_departemen', kode_subdepartemen='$kode_subdepartemen',nik_ktp='$nik_ktp', update_by='$kode_user' where nik='$nik'");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=karyawan";
        </script>
<?php
    }
}

?>