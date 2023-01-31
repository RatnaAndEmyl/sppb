<?php
include '..\..\koneksi.php';
    $angka = date('Ymdhis');
$kode_jabatan            = $_POST['kode_jabatan'];
$kode_departemen             = $_POST['kode_departemen'];
$kode_subdepartemen         = $_POST['kode_subdepartemen'];
$kode_golongan          = $_POST['kode_golongan'];
$simpan             = $_POST['simpan'];
if ($simpan) {
    $sql = $koneksi_master->query("insert into hr_master.tb_analisa_jabatan values(null,'$kode_jabatan','$kode_departemen','$kode_subdepartemen','$kode_golongan','$kode_mitrakerja',null,'$nik',null,null,null,null,'A')");

    if ($sql) {
?>
        <script type="text/javascript">
            //alert("Data Berhasil Disimpan")
            window.location.href ="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>"
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            //alert("Data Gagal Disimpan");
            window.location.href = "?page=analisajabatan&aksi=tambah";
        </script>
<?php
    }
}

?>