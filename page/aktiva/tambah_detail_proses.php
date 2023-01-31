<?php
include '..\..\koneksi.php';


$kode_aktiva    = $_POST['kode_aktiva'];
$kode_trxtype    = $_POST['kode_trxtype'];
$periode_awal   = $_POST['periode_awal'];
$periode_akhir   = $_POST['periode_akhir'];
$deskripsi_aktiva   = $_POST['deskripsi_aktiva'];
$simpan             = $_POST['simpan'];
if ($simpan) {

    if ($kode_trxtype=='TRX000014') {
        $sqltext ="INSERT INTO pb_transaksi.tb_aktiva_detail values('$kode_aktiva','$kode_trxtype','$deskripsi_aktiva',null,$periode_awal,$periode_akhir,NULL,'A',null,'$kode_user',null,null,null,null)";
         $sql = $koneksi_master->query("$sqltext");
         echo $sqltext.'<br>';
    } else{
        $sqltext ="INSERT INTO pb_transaksi.tb_aktiva_detail values('$kode_aktiva','$kode_trxtype','$deskripsi_aktiva',null,null,null,NULL,'A',null,'$kode_user',null,null,null,null)";
        $sql = $koneksi_master->query("$sqltext");
        echo $sqltext.'<br>';
    }
   
         
    
   
    if ($sql) {

?>
        <script type="text/javascript">
            alert("Data Berhasil Disimpan")
            window.location.href = "?page=aktiva&aksi=detail&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_aktiva . $angka);?>";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Data Gagal Disimpan");
            window.location.href = "?page=aktiva&aksi=tambah_detail";
        </script>
<?php
    }
}

?>