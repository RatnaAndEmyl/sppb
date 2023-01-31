<?php
include '..\..\koneksi.php';

$id_barang               = $_POST['id_barang'];
$id_jenis_barang         = $_POST['id_jenis_barang'];
$tanggal                 = $_POST['tanggal'];
$jumlah_pembelian        = $_POST['jumlah_pembelian'];
$harga_satuan            = $_POST['harga_satuan'];

// $harga_satuan    = addslashes($_POST ['harga_satuan']);
// $harga_satuan_fix= str_replace(".", "", $harga_satuan);
// $total_harga    = addslashes($_POST ['total_harga']);
// $total_harga_fix= str_replace(".", "", $total_harga);

$total_harga             = $_POST['total_harga'];
$kode_suplier            = $_POST['kode_suplier'];
$simpan                  = $_POST['simpan'];

if ($simpan) {

    // $sql = $koneksi_master->query("INSERT INTO pb_transaksi.tb_pembelian values(null,'$kode_modul',upper('$nama_submodul'),'$jenis','$link',null,'A',null,'$kode_user',null,null,null,null)");

    // SELECT `kode_pembelian`, `user`, `id_barang`, `id_jenis_barang`, `kode_user`, `kode_jabatan`, `tanggal`, `jumlah_pembelian`, `harga_satuan`, `total_harga`, `kode_suplier`, `status`, `tgl_create`, `create_by`, `tgl_update`, `update_by`, `tgl_delete`, `delete_by` FROM `tb_pembelian` WHERE 1

    $sqljabatan = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan WHERE status='A' and nik='$nik_login'");
    $data_jabatan = $sqljabatan->fetch_assoc();

    $sqltext = "INSERT INTO pb_transaksi.tb_pembelian values(null,'$nama','$nik_login','$id_barang','$id_jenis_barang','$kode_user','$data_jabatan[kode_jabatan]','$tanggal','$jumlah_pembelian','$harga_satuan','$total_harga','$kode_suplier','A',null,'$kode_user',null,null,null,null)";
    $sql = $koneksi_master->query($sqltext);

    echo $sqltext . '<br>';
    echo $harga_satuan;

    if ($sql) {
?>

        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            // window.location.href = "?page=pembelian";
        </script>

    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            // window.location.href = "?page=pembelian&aksi=tambah";
        </script>
<?php
    }
}

?>