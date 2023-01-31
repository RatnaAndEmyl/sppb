<?php 
include "koneksi.php";
 $angka=date('Ymdhis');

$kode_user = $_POST ['kode_user'];
$kode_submodul = $_POST ['kode_submodul'];
$tampil = $_POST ['tampil'];
$tambah = $_POST ['tambah'];
$ubah = $_POST ['ubah'];
$hapus = $_POST ['hapus'];
$tgl_create = $_POST ['tgl_create'];
$create_by = $_POST ['create_by'];
$tgl_ubah = $_POST ['tgl_ubah'];
$ubah_by = $_POST ['ubah_by'];
$simpan = $_POST ['simpan'];
if ($simpan) {
    // SELECT `kode_user`, `kode_submodul`, `tampil`, `tambah`, `ubah`, `hapus`, `tgl_create`, `create_by`, `tgl_update`, `update_by` FROM `tb_user_submodul` WHERE 1
    
    $sql = $koneksi_master->query("update pb_role.tb_user_submodul set  tampil='$tampil', tambah='$tambah', ubah='$ubah', hapus='$hapus' where kode_user='$kode_user' and kode_submodul='$kode_submodul' ");
    // echo "ubah db_role.tb_user_submodul set  tampil='$tampil', tambah='$tambah', ubah='$ubah', hapus='$hapus'  where kode_user='$kode_user' and kode_submodul='$kode_submodul' ";
  
    if ($sql) {
        ?>
        <script type="text/javascript">
            
            alert ("Data Berhasil Diubah")
            window.location.href = "?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user.$angka); ?>";

        </script>
        <?php
    }
}

 ?>