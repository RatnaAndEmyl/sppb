<?php
include '..\..\koneksi.php';

$kode_trxtype     = $_POST['kode_trxtype'];
// $kode_email     = $_POST['kode_email'];

$simpan             = $_POST['simpan'];
if ($simpan) {
  foreach ($_POST['kode_email'] as $kode_email) {
    $sqltext ="INSERT INTO pb_transaksi.tb_pengingat_email values('$kode_trxtype','$kode_email','A',null,'$kode_user',null,null,null,null)";
         $sql = $koneksi_master->query("$sqltext");
         echo $sqltext.'<br>';
}        
    if ($sql) {
?>

<script type="text/javascript">
  alert("Data Berhasil Disimpan")
  window.location.href =
    "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";
</script>
<?php
    } else { ?>
        <script type="text/javascript">
        alert("Data Gagal Disimpan");
        window.location.href = "?page=jatuh_tempo&aksi=pe_tambah";
        </script>
    <?php }
} 
?>
