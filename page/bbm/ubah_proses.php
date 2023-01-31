<?php
include "koneksi.php";

$kode_bbm          = $_POST['kode_bbm'];
$tanggal_bbm                  = $_POST['tanggal_bbm'];
$kode_gudang              = $_POST['kode_gudang'];
$kode_user              = $_POST['kode_user'];

$simpan                  = $_POST['simpan'];
if ($simpan) {

    $sqljabatan = $koneksi_master->query("SELECT b.kode_jabatan, a.nik, b.nama_karyawan FROM pb_role.tb_user a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik WHERE a.status='A' AND b.status='A' AND a.kode_user='$kode_user'");

    $data_jabatan = $sqljabatan->fetch_assoc();
    $kode_jabatan=$data_jabatan['kode_jabatan'];
    $nik=$data_jabatan['nik'];
    $nama_karyawan=$data_jabatan['nama_karyawan'];

    $test = "UPDATE pb_transaksi.tb_bbm SET tanggal_bbm='$tanggal_bbm', update_by='$kode_user', kode_gudang='$kode_gudang' WHERE kode_bbm='$kode_bbm'";
    $sql = $koneksi_master->query($test);

    echo $test;

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=bbm";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=bbm&aksi=ubah";
        </script>
<?php
    }
}

?>