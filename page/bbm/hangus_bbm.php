<?php
$angka = date('Ymdhis');
$kode_bbm = $_GET['kode_bbm'];
// $kode_barang = $_GET['kode_barang'];
//echo $kode_barang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_bbm . $pc) <> $oc) {
?>

    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>

<?php
}

?>

<?php


$sqltext = "UPDATE pb_transaksi.tb_bbm SET status_bbm='XX', update_by='$kode_user' WHERE kode_bbm='$kode_bbm'";

$sql = $koneksi_master->query($sqltext);

if ($sql) {
?>

    <script type="text/javascript">
        alert("Barang Hangus");
        window.location.href = "?page=bbm&aksi=history_bbm";
    </script>

<?php
} else { ?>
    <script type="text/javascript">
        // alert("Status Gagal Disimpan");
        window.location.href = "?page=bbm&aksi=history_bbm";
    </script>
<?php
}


?>