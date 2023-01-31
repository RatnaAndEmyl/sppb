<?php
$angka = date('Ymdhis');
$kode_bbk = $_GET['kode_bbk'];

// $kode_barang = $_GET['kode_barang'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbk . $pc) <> $oc) {
?>

    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>

<?php } ?>

<?php
$sqltext = "UPDATE pb_transaksi.tb_bbk SET status_bbk='XX', update_by='$kode_user' WHERE kode_bbk='$kode_bbk'";

$sql = $koneksi_master->query($sqltext);

if ($sql) { ?>

    <script type="text/javascript">
        alert("Barang Hangus");
        window.location.href = "?page=bbk&aksi=history_bbk";
    </script>

<?php } else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=bbk&aksi=history_bbk";
    </script>
<?php
}


?>