<?php
include '..\..\koneksi.php';


$kode_trxtype    = $_POST['kode_trxtype'];
$jenis_masa_aktif    = $_POST['jenis_masa_aktif'];
$masa_aktif    = $_POST['masa_aktif'];
$simpan             = $_POST['simpan'];

$tambah = '+'.$masa_aktif;
if ($simpan) {
    foreach ($_POST['kode_trxtype'] as $kode_trxtype) {
        $sqltext ="INSERT INTO pb_master.tb_mapping_reminder values(null,'$kode_trxtype','$jenis_masa_aktif','$tambah','A',null,'$kode_user',null,null,null,null)";
        $sql = $koneksi_master->query("$sqltext");
        echo $sqltext.'<br>';
   }
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=mapping_reminder";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping_reminder&aksi=tambah";
        </script>
<?php
    }
}

?>