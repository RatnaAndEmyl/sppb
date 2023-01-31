simpan_proses.php

<?php
$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];
// echo $kode_sppb . '<br>';


$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_sppb . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sqltext_max_status = "SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE kode_sppb='" . $kode_sppb . "' AND status<>'N'; ";         /*ini mencari jumlah data berdasarkan kode_sppb (data yng diklik tu kan ada kode_sppbnya lok) di tabel sppb detail dimana statusnya tu A= aktif (yg gk di hapus)*/


$sql_maxcount_status = $koneksi_master->query($sqltext_max_status);
$tampil_maxcount_status = $sql_maxcount_status->fetch_assoc();


$sqltext_count_status = "SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE kode_sppb='" . $kode_sppb . "' AND status<>'N' AND status_sppb='A'; ";        /*ini mencari jumlah data berdasarkan kode_sppb (data yng diklik tu kan ada kode_sppbnya lok) di tabel sppb detail dimana statusnya tu A= aktif, gk dihapus dan mencari yang status permintannya tu sudah di lakukan tindakan, whether it's Y (yes) or N (no)*/

$sql_count_status = $koneksi_master->query($sqltext_count_status);
$tampil_count_status = $sql_count_status->fetch_assoc();




$sqltext_count_status_n = "SELECT COUNT(kode_sppb) 'jumlah' FROM pb_transaksi.tb_sppb_detail WHERE kode_sppb='" . $kode_sppb . "' AND status<>'N' AND status_sppb='N'; ";
$sql_count_status_n = $koneksi_master->query($sqltext_count_status_n);
$tampil_count_status_n = $sql_count_status_n->fetch_assoc();
echo $tampil_count_status_n['jumlah'] . '<br>';



// echo $tampil_maxcount_status['jumlah'].'<br>';
// echo $tampil_count_status['jumlah'];


$approve = 0;
if ($tampil_count_status_n['jumlah'] == $tampil_maxcount_status['jumlah']) {             /*perkondisian, kalo jumlah data yang aktif = data yang aktif & data yang udah dilakukan tindakan, maka*/
    $test = "UPDATE pb_transaksi.tb_sppb SET status_sppb='X', update_by='$kode_user' WHERE kode_sppb='$kode_sppb'";              /*akan mengupdate status_sppb data di tabel sppb (tabel utama) menjadi Yes */
    $approve = 1;
} else {
    $test = "UPDATE pb_transaksi.tb_sppb SET status_sppb='Y', update_by='$kode_user' WHERE kode_sppb='$kode_sppb'";                     /*kalo jumlah data status A nya gk sama dengan data yg berstatus A dan data yang diberi tindakan maka akan mengupdate status_sppb data di tabel sppb detail menjadi A (atau statu dengan arti perlu persetujuan atau tindakan) */
}
// echo $test;
$sql = $koneksi_master->query($test);

if ($sql) {
?>
    <script type="text/javascript">
        <?php
        if ($approve == 0) { ?>
            alert("Dokumen Berhasil di Approve");
        <?php } else { ?>
            alert("Dokumen Ditolak");
        <?php  } ?>
        // window.location.href = "?page=sppb";
        window.location.href = "?page=home";
    </script>
<?php
} else { ?>
    <script type="text/javascript">
        alert("Dokumen Tidak ");
        window.location.href = "?page=sppb&aksi=ubah";
    </script>
<?php }
?>