<?php
include '..\..\koneksi.php';

$nama_suplier             = $_POST['nama_suplier'];
$no_hp_suplier            = $_POST['no_hp_suplier'];
$simpan                 = $_POST['simpan'];

if ($simpan) {

    $sqltext = "INSERT INTO pb_master.tb_suplier values(null, upper('$nama_suplier'),'$no_hp_suplier','A',null,'$kode_user',null,null,null,null)";
    $sql = $koneksi_master->query($sqltext);
    echo $no_hp_suplier;
    echo $sqltext;
    if ($sql) {
?>


        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=suplier";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=suplier&aksi=tambah";
        </script>
<?php
    }
}

?>