<?php
include '..\..\koneksi.php';

$kode_departemen        = $_POST['kode_departemen'];
$nama_departemen        = $_POST['nama_departemen'];
$nama_subdepartemen     = $_POST['nama_subdepartemen'];
$simpan                 = $_POST['simpan'];


if ($simpan) {

    // SELECT `kode_subdepartemen`, `kode_departemen`, `nama_subdepartemen`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by`, `status` FROM `tb_subdepartemen` WHERE 1

    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_subdepartemen_karyawan values(null,'$kode_departemen',upper('$nama_subdepartemen'),null,'$kode_user',null,null,null,null,'A')");

    if ($sql) {

?>


<script type="text/javascript">
alert("Data Berhasil Disimpan")
window.location.href = "?page=subdepartemen";
</script>

<?php
    } else { ?>
<script type="text/javascript">
alert("Data Gagal Disimpan");
window.location.href = "?page=subdepartemen&aksi=tambah";
</script>
<?php
    }
}

?>