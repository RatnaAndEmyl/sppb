<?php
include '..\..\koneksi.php';

$kode_trxtype    = $_POST['kode_trxtype'];
$deskripsi_subtrxtype    = $_POST['deskripsi_subtrxtype'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_subtrxtype values('$kode_trxtype','$deskripsi_subtrxtype','A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=subtrxtype&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka);?>";
        
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=subtrxtype&aksi=tambah";
        </script>
<?php
    }
}

?>