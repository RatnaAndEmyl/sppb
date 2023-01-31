<?php
include "koneksi.php";

$kode_aktiva   = $_GET['kode_aktiva'];
$kode_trxtype   = $_GET['kode_trxtype'];
$kode_pengingat   = $_GET['kode_pengingat'];
$start   = $_GET['start'];
$end   = $_GET['end'];
$tgl_jatuh_tempo = $_GET['tgl_jatuh_tempo'];
// $simpan            = $_POST['simpan'];


// echo $tgl2; 

if ($kode_aktiva) {
    $sql = $koneksi_master->query("SELECT tgl_jatuh_tempo, periode_akhir, kode_aktiva, kode_trxtype FROM pb_transaksi.tb_aktiva_detail where kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype'");
    $tampil = $sql->fetch_assoc();

    $tgl_jatuh_baru = $tampil ['tgl_jatuh_tempo'];
    $periode_baru = $tampil ['periode_akhir'];

    $sql_masa = $koneksi_master->query("SELECT kode_trxtype, jenis_masa_aktif, masa_aktif FROM pb_master.tb_mapping_reminder where kode_trxtype='$kode_trxtype'");
    $tampil_masa = $sql_masa->fetch_assoc();

    $jenis_masa_aktif =  $tampil_masa ['jenis_masa_aktif'];
    $masa_aktif = $tampil_masa ['masa_aktif'];

    $masa_aktif_fiks = $masa_aktif.$jenis_masa_aktif;
// $k = '+15';
// $q = 'year';

// $t = $k.$q;

    if($_SESSION['s_pilih_jatuh'] = 'TRX000014') {
        $tgl2    = date('Y-m-d', strtotime($masa_aktif_fiks, strtotime($periode_baru))); 

        $test = "UPDATE pb_transaksi.tb_aktiva_detail set periode_akhir='$tgl2', update_by='$kode_user' where kode_trxtype= '$kode_trxtype' and kode_aktiva='$kode_aktiva'";
        $sql = $koneksi_master->query($test);
    } else {
        $tgl2    = date('Y-m-d', strtotime($masa_aktif_fiks, strtotime($tgl_jatuh_baru))); 

        $test = "UPDATE pb_transaksi.tb_aktiva_detail set tgl_jatuh_tempo='$tgl2', update_by='$kode_user' where kode_trxtype= '$kode_trxtype' and kode_aktiva='$kode_aktiva'";
        $sql = $koneksi_master->query($test);

    }
    
    echo $test;  
    
   

    if ($test) {
?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah")
            window.location.href = "?page=home";
        </script>
<?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=home";
        </script>
<?php
    }
}

$sql_p = $koneksi_master->query("SELECT start, end, kode_aktiva, kode_trxtype FROM pb_transaksi.tb_pengingat where kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype' and kode_pengingat = '$kode_pengingat'");
$tampil_p = $sql_p->fetch_assoc();

$start_baru = $tampil_p ['start'];
$end_baru = $tampil_p ['end'];
$start2    = date('Y-m-d', strtotime($masa_aktif_fiks, strtotime($start_baru))); 
$end2    = date('Y-m-d', strtotime($masa_aktif_fiks, strtotime($end_baru))); 

$test2 = "UPDATE pb_transaksi.tb_pengingat set start='$start2', end='$end2', update_by='$kode_user' where kode_trxtype= '$kode_trxtype' and kode_aktiva='$kode_aktiva' and kode_pengingat = '$kode_pengingat' ";
$sql2 = $koneksi_master->query($test2);

echo $test2;


?>