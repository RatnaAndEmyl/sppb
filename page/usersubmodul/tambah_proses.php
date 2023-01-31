<?php 
include '..\..\koneksi.php';

 $angka=date('Ymdhis');

$kode_user = $_POST ['kode_user'];
$kode_submodul = $_POST ['kode_submodul'];
$view = $_POST ['view'];
$insert = $_POST ['insert'];
$update = $_POST ['update'];
$delete = $_POST ['delete'];
$tgl_create = $_POST ['tgl_create'];
$create_by = $_POST ['create_by'];
$tgl_update = $_POST ['tgl_update'];
$update_by = $_POST ['update_by'];
$simpan = $_POST ['simpan'];

if ($simpan) {

    // SELECT `kode_user`, `kode_submodul`, `tampil`, `tambah`, `ubah`, `hapus`, `tgl_create`, `create_by`, `tgl_update`, `update_by` FROM `tb_user_submodul` WHERE 1
   $sql = $koneksi_master->query("insert into pb_role.tb_user_submodul values('$kode_user','$kode_submodul','$view','$insert','$update','$delete',null,'$kodeuser',null,null);"); 
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
			window.location.href = "?page=usersubmodul&aksi=tambah";
        </script>
    	<?php
    }
}

 ?>