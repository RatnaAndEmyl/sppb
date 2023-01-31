<?php
include '..\..\koneksi.php';

$kode_mapping    = $_POST['kode_mapping'];
$kode_trxtype    = $_POST['kode_trxtype'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    foreach ($_POST['kode_trxtype'] as $kode_trxtype) {
         $sqltext ="INSERT INTO pb_master.tb_mapping_detail values('$kode_mapping','$kode_trxtype','A',null,'$kode_user',null,null,null,null)";
         $sql = $koneksi_master->query("$sqltext");
         echo $sqltext.'<br>';
    }
   
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=mapping&aksi=detail&kode_mapping=<?php echo $kode_mapping; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping . $angka);?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping&aksi=tambah_detail";
        </script>
<?php
    }
}

?>