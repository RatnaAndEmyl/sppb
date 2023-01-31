<?php
include '..\..\koneksi.php';

$pengguna   = $_POST['pengguna'];
$email   = $_POST['email'];
$simpan             = $_POST['simpan'];

if ($simpan) {
    $sql = $koneksi_master->query("INSERT INTO pb_master.tb_email values(null,'$pengguna','$email','A',null,'$kode_user',null,null,null,null)");

    if ($sql) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=email";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=email&aksi=tambah";
        </script>
<?php
    }
}

?>