
<?php
$angka = date('Ymdhis');

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
?>
<?php 
 include "..\\..\\koneksi.php";
 $jatuh_tempo = $_POST["jatuh_tempo"];
 $kode_trxtype_awal = $_POST["kode_trxtype_awal"];

// echo $kode_trxtype_awal;

$sql = $koneksi_master->query("SELECT b.kode_aktiva, a.kode_aktiva, b.tgl_jatuh_tempo, b.periode_akhir FROM pb_transaksi.tb_aktiva a inner join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva where a.status='A' and b.status='A' and b.kode_aktiva='$jatuh_tempo' and b.kode_trxtype='$kode_trxtype_awal'");
$tampil = $sql->fetch_assoc();

?>
<?php if ($kode_trxtype_awal=='TRX000014'){ ?>
<div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111">(Periode Akhir GPS HBLOW : <?php echo strftime("%A, %d %B %Y", strtotime($tampil['periode_akhir'])); ?>)</label> <br>
</div>
<?php } else { ?>
    <div class="table-responsive" id="table-responsive">
        <label for="exampleInputEmail111">(Tanggal Jatuh Tempo : <?php echo strftime("%A, %d %B %Y", strtotime($tampil['tgl_jatuh_tempo'])); ?>)</label> <br>
<?php } ?>


<?php if ($kode_trxtype_awal=='TRX000014'){ ?>
<input type="text" id="tgl_jatuh_tempo" value="<?php echo $tampil['periode_akhir'].'-01';?>" hidden >
<?php } else {?>
    

<input type="text" id="tgl_jatuh_tempo" value="<?php echo $tampil['tgl_jatuh_tempo'];?>" hidden >
<?php }?>
<!-- <input type="text" id="value" value="3" hidden> -->

<div class="table-responsive" id="view_p_perulangan2"></div>


<script>
 $("#tgl_jatuh_tempo").ready(function(){
   var tgl_jatuh_tempo = $("#tgl_jatuh_tempo").val();
   var value = $("#value").val();

   //alert(tgl_jatuh_tempo);

   $.ajax({
       type: "POST",
       dataType: "html",
       url: "dist/ajax/view_periode.php", 
       data: "tgl_jatuh_tempo="+tgl_jatuh_tempo+"&value="+value,
       success: function(msg){
          
           if(msg == ''){
               var div = document.getElementById('table-responsive');
                  div.remove();
           }
          
           else{
               $("#view_p_perulangan2").html (msg);                                              
           }
          
           $("#imgLoad").hide();
       }
   });    
});
</script>
