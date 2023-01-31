<?php 
include '..\..\koneksi.php';

 $angka=date('Ymdhis');

$kode_user = $_POST ['kode_user'];
$jenis_duplikat = $_POST ['jenis_duplikat'];
$referensi_user = $_POST ['referensi_user'];
$tgl_create = $_POST ['tgl_create'];
$create_by = $_POST ['create_by'];
$tgl_update = $_POST ['tgl_update'];
$update_by = $_POST ['update_by'];
$simpan = $_POST ['simpan'];

if ($simpan) {
    if ($jenis_duplikat=='Kosongkan')
    {
      $sql=  $koneksi_master->query("delete from db_role.tb_user_submodul where kode_user='".$kode_user."';");
        
      $sql=  $koneksi_master->query("insert into db_role.tb_user_submodul select  '".$kode_user."', kode_submodul, tampil, tambah, ubah, hapus,null,'$create_by',null,null from db_role.tb_user_submodul where kode_user='".$referensi_user."';");
    }
    else
    if ($jenis_duplikat=='Ambil')
    {
        $sql=  $koneksi_master->query("insert into db_role.tb_user_submodul  select '".$kode_user."', kode_submodul, tampil, tambah, ubah, hapus,null,'".$create_by."',null,null from db_role.tb_user_submodul where kode_user='".$referensi_user."' and kode_submodul not in (select kode_submodul from db_role.tb_user_submodul where kode_user='$kode_user');");
    }
   
    if ($sql) {
        ?>
        <script type="text/javascript">
            
            alert ("Data Berhasil Disimpan")
             window.location.href = "?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user.$angka); ?>";

        </script>
        <?php
    }else
    {?>
        <script type="text/javascript">
			alert ("Data Gagal Disimpan");
		  window.location.href = "?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user.$angka); ?>";
        </script>
    	<?php
    }
}

 ?>