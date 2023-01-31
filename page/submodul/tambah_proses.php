<?php
include '..\..\koneksi.php';

$kode_modul             = $_POST['kode_modul'];
$nama_modul             = $_POST['nama_modul'];
$nama_submodul          = $_POST['nama_submodul'];
$jenis                  = $_POST['jenis'];

$link                   = addslashes($_POST['link']);
$status                 = $_POST['status'];
$tgl_create             = $_POST['tgl_create'];
$create_by              = $_POST['create_by'];
$tgl_update             = $_POST['tgl_update'];
$update_by              = $_POST['update_by'];
$tgl_delete             = $_POST['tgl_delete'];
$delete_by              = $_POST['delete_by'];
$simpan                 = $_POST['simpan'];


if ($simpan) {

    // SELECT `kode_submodul`, `kode_modul`, `nama_submodul`, `jenis`, `link`, `website`, `status`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_submodul` WHERE 1

    $sql = $koneksi_master->query("INSERT INTO pb_role.tb_submodul values(null,'$kode_modul',upper('$nama_submodul'),'$jenis','$link',null,'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=submodul";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=submodul&aksi=tambah";
        </script>
<?php
    }
}

?>