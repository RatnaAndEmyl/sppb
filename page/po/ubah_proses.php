<?php
include "koneksi.php";

$kode_po                = $_POST['kode_po'];
$tanggal_po             = $_POST['tanggal_po'];
$kode_gudang            = $_POST['kode_gudang'];
// $id_barang                = $_POST['id_barang'];
// $id_jenis_barang          = $_POST['id_jenis_barang'];
// $jumlah                   = $_POST['jumlah'];
$simpan                 = $_POST['simpan'];
if ($simpan) {
 
    $mysqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $dt_jabatan = $mysqljabatan->fetch_assoc();

    $test = "UPDATE pb_transaksi.tb_po SET tanggal_po='$tanggal_po', update_by='$kode_user', kode_gudang='$kode_gudang' WHERE kode_po='$kode_po'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=po";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=po&aksi=ubah";
        </script>
<?php
    }
}

?>