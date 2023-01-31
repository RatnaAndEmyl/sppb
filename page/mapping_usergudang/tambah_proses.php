<?php
include '..\..\koneksi.php';


$kode_gudang    = $_POST['kode_gudang'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_mapping_usergudang values(null,upper('$kode_gudang'),'A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=mapping_usergudang";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping_usergudang&aksi=tambah";
        </script>
<?php
    }
}

?>