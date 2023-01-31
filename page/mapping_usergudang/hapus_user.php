<?php
$angka = date('Ymdhis');
$kode_mapping_usergudang = $_GET['kode_mapping_usergudang'];
$kode_user     = $_GET['kode_user'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping_usergudang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}
$sqltext = "UPDATE pb_master.tb_mapping_usergudang_detail SET status ='N', update_by='$kode_user' WHERE kode_mapping_usergudang='$kode_mapping_usergudang' AND kode_user='$kode_user'";
$sql = $koneksi_master->query("$sqltext");
// echo $sqltext;

?>

<script type="text/javascript">
    alert("Data Berhasil Dihapus")
    window.location.href = "?page=mapping_usergudang&aksi=detail&kode_mapping_usergudang=<?php echo $kode_mapping_usergudang; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_mapping_usergudang . $angka);?>";
</script>