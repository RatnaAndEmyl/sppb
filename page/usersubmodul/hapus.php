<?php 

$kode_user=$_GET['kode_user'];
$kode_submodul=$_GET['kode_submodul'];

$angka=date('Ymdhis');

  $sql = $koneksi_master->query("delete from pb_role.tb_user_submodul where kode_user='$kode_user' and kode_submodul='$kode_submodul' ");


?>

<script type="text/javascript">

	alert ("Data Berhasil Dihapus")
	window.location.href = "?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user.$angka); ?>";


</script>
