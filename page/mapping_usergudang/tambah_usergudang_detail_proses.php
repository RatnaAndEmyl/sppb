<?php
include '..\..\koneksi.php';

$kode_mapping_usergudang    = $_POST['kode_mapping_usergudang'];
// $kode_user    = $_POST['kode_user'];

$simpan             = $_POST['simpan'];
if ($simpan) {
    foreach ($_POST['kode_user'] as $kode_user) {
         $sqltext ="INSERT INTO pb_master.tb_mapping_usergudang_detail values('$kode_mapping_usergudang','$kode_user','A',null,'$kode_user',null,null,null,null)";
         $sql = $koneksi_master->query("$sqltext");
         echo $sqltext.'<br>';
    }
   
    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=mapping_usergudang&aksi=detail&kode_mapping_usergudang=<?php echo $kode_mapping_usergudang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping_usergudang . $angka);?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=mapping_usergudang&aksi=tambah_usergudang_detail";
        </script>
<?php
    }
}

?>