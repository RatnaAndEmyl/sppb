<?php
include "koneksi.php";

$kode_sppb               = $_POST['kode_sppb'];
$tanggal_sppb            = $_POST['tanggal_sppb'];
$kode_gudang             = $_POST['kode_gudang'];
// $id_barang                = $_POST['id_barang'];
// $id_jenis_barang          = $_POST['id_jenis_barang'];
// $jumlah                   = $_POST['jumlah'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
 
    $mysqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $dt_jabatan = $mysqljabatan->fetch_assoc();

    $test = "UPDATE pb_transaksi.tb_sppb SET tanggal_sppb='$tanggal_sppb', update_by='$kode_user', kode_gudang='$kode_gudang' WHERE kode_sppb='$kode_sppb'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=sppb";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=sppb&aksi=ubah";
        </script>
<?php
    }
}

?>