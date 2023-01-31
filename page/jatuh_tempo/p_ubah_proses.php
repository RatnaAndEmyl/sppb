<?php
include "koneksi.php";

$kode_pengingat          = $_POST['kode_pengingat'];
$kode_aktiva          = $_POST['kode_aktiva'];
$kode_trxtype          = $_POST['kode_trxtype'];
$ulang          = $_POST['ulang'];
$start          = $_POST['start'];
$end          = $_POST['end'];
$periode          = $_POST['periode'];
$deskripsi          = $_POST['deskripsi'];
$simpan                  = $_POST['simpan'];

// kode_pengingat='$kode_pengingat',kode_aktiva='$kode_aktiva',kode_trxtype'='$kode_trxtype',

if ($simpan) {

  // INSERT INTO pb_transaksi.tb_pengingat values(null,'$kode_aktiva','$kode_trxtype','$ulang','$start','$start','$deskripsi',null,'Y','A',null,'$kode_user',null,null,null,null
  if ($ulang == '1') {
      $sql = $koneksi_master->query("UPDATE pb_transaksi.tb_pengingat set kode_aktiva='$kode_aktiva',ulang='$ulang', start='$start', end='$start', deskripsi='$deskripsi', update_by='$kode_user' WHERE kode_pengingat='$kode_pengingat' and kode_trxtype='$kode_trxtype'");
      
  } else  {
     $sql = $koneksi_master->query("UPDATE pb_transaksi.tb_pengingat set kode_aktiva='$kode_aktiva',ulang='$ulang', start='$start', end='$end', deskripsi='$deskripsi', update_by='$kode_user' where kode_pengingat='$kode_pengingat'and kode_trxtype='$kode_trxtype'");



    
  }
 
        if ($sql) {
?>
<script type="text/javascript">
  alert("Data Berhasil Diubah")
  window.location.href =
    "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";

</script>
<?php
    } else { ?>
<script type="text/javascript">
  alert("Data Gagal Disimpan");
  window.location.href =
    "?page=jatuh_tempo&aksi=p_ubah&kode_trxtype=<?php echo $kode_trxtype; ?>&kode_pengingat=<?php echo $kode_pengingat; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";

</script>
<?php
    }
}

?>
