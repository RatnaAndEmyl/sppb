<?php
include '..\..\koneksi.php';

$kode_kategori    = $_POST['kode_kategori'];
$kode_subkategori    = $_POST['kode_subkategori'];
$deskripsi_aktiva    = $_POST['deskripsi_aktiva'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_transaksi.tb_aktiva values(null,'$kode_kategori','$kode_subkategori',upper('$deskripsi_aktiva'),'A',null,'$kode_user',null,null,null,null)");

    $sql_cari_kode_aktiva = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva WHERE status='A'  order by kode_aktiva desc"); /*kita mencari tau kode_aktiva yang akan diambil ke tambah barang, sedangkan username='$nama' nah si $nama tu ngambil dari session di index.php*/ 
    
    $data_cari_kode_aktiva = $sql_cari_kode_aktiva->fetch_assoc(); 

    $kode_aktiva = $data_cari_kode_aktiva['kode_aktiva'];

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=aktiva&aksi=tambah_detail&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_aktiva . $angka); ?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=aktiva&aksi=tambah";
        </script>
<?php
    }
}

?>