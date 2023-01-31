<?php
include "koneksi.php";

$nama_karyawan      = $_POST['nama_karyawan'];
$jk                 = $_POST['jk'];
$alamat             = $_POST['alamat'];
$agama              = $_POST['agama'];
$kode_jabatan       = $_POST['kode_jabatan'];
$kode_departemen    = $_POST['kode_departemen'];
$kode_subdepartemen = $_POST['kode_subdepartemen'];
$nik_ktp            = $_POST['nik_ktp'];
$tgl_masuk            = $_POST['tgl_masuk'];
// $tgl_keluar            = $_POST['tgl_keluar'];
$simpan             = $_POST['simpan'];

if ($simpan) {


    // SELECT `nik`, `nama_karyawan`, `jk`, `alamat`, `agama`, `kode_jabatan`, `kode_departemen`, `kode_subdepartemen`, `nik_ktp`, `status`, `tgl_masuk`, `tgl_keluar`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_karyawan` WHERE 1

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_karyawan values(null,upper('$nama_karyawan'),'$jk',upper('$alamat'),upper('$agama'),'$kode_jabatan', '$kode_departemen', '$kode_subdepartemen','$nik_ktp','A','$tgl_masuk',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=karyawan";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=karyawan&aksi=tambah";
        </script>
<?php
    }
}

?>

?>