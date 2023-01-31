<?php
include '..\..\koneksi.php';

$kode_aktiva   = $_POST['kode_aktiva'];
$kode_trxtype   = $_POST['kode_trxtype'];
$tgl_jatuh_tempo   = $_POST['tgl_jatuh_tempo'];
$periode_awal   = $_POST['periode_awal'];
$periode_akhir   = $_POST['periode_akhir'];
$deskripsi_aktiva   = $_POST['deskripsi_aktiva'];
// $file   = $_FILES['file'];


// untuk upload file 
$images = $_FILES['file']['name'];
if ($_FILES['file']['name'] <> null) {
    $images = date("Ymdhis") .' '. $images; //berikan spasi antara nama file dengan tanggal uploadnya
}
$lokasi = $_FILES['file']['tmp_name'];
$upload = move_uploaded_file($lokasi, "dist/img_web/" . $images);

$simpan             = $_POST['simpan'];
if ($simpan) {
    if ($kode_trxtype=='TRX000014') {
        $sqltext ="INSERT INTO pb_transaksi.tb_aktiva_detail values('$kode_aktiva','$kode_trxtype',UPPER('$deskripsi_aktiva'),null,'$periode_awal','$periode_akhir','$images','A',null,'$kode_user',null,null,null,null)";
         $sql = $koneksi_master->query("$sqltext");
        //  echo $sqltext.'<br>';
    } else{
        $sql = $koneksi_master->query("INSERT INTO pb_transaksi.tb_aktiva_detail values('$kode_aktiva','$kode_trxtype',UPPER('$deskripsi_aktiva'),'$tgl_jatuh_tempo',null,null,'$images','A',null,'$kode_user',null,null,null,null)");
                 echo $sql.'<br>';

    }
    if ($sql) {
?>
<script type="text/javascript">
  alert("Data Berhasil Disimpan")

//   window.location.href ="?page=home&halaman=1";
  window.location.href ="?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";

    // ?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>

</script>
<?php
    } else { ?>
        <script type="text/javascript">
        alert("Data Gagal Disimpan");
        window.location.href = "?page=jatuh_tempo&aksi=tambah";
        </script>
<?php }
}

?>
