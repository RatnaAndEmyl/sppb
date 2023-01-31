<?php
include "koneksi.php";

$kode_pembelian          = $_POST['kode_pembelian'];
// $user                     = $_POST['user'];
// $tanggal                  = $_POST['tanggal'];
$id_barang               = $_POST['id_barang'];
$id_jenis_barang         = $_POST['id_jenis_barang'];
$jumlah_pembelian        = $_POST['jumlah_pembelian'];
$harga_satuan            = $_POST['harga_satuan'];
$total_harga             = $_POST['total_harga'];
$kode_suplier            = $_POST['kode_suplier'];
$simpan                  = $_POST['simpan'];
if ($simpan) {
 
    $mysqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $dt_jabatan = $mysqljabatan->fetch_assoc();

    $test = "UPDATE pb_transaksi.tb_pembelian SET id_barang='$id_barang', id_jenis_barang='$id_jenis_barang', jumlah_pembelian='$jumlah_pembelian', harga_satuan='$harga_satuan', total_harga ='$total_harga', kode_suplier='$kode_suplier', update_by='$kode_user' WHERE kode_pembelian='$kode_pembelian'";
    $sql = $koneksi_master->query($test);

    $sqltext = "INSERT INTO pb_transaksi.tb_pembelian values(null,'$nama','$nik_login','$id_barang','$id_jenis_barang','$kode_user','$data_jabatan[kode_jabatan]','$tanggal','$jumlah_pembelian','$harga_satuan','$total_harga','$kode_suplier','A',null,'$kode_user',null,null,null,null)";

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=pembelian";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=pembelian&aksi=ubah";
        </script>
<?php
    }
}

?>