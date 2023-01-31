<?php 
 include "..\\..\\koneksi.php";

 $kode_trxtype = $_POST["kode_trxtype"];
//  echo $kode_trxtype;
 

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where kode_trxtype='$kode_trxtype'");

$tampil = $sql->fetch_assoc();

$flag_inputan =  $tampil['flag_inputan'];
 ?>
   	


<div class="table-responsive" id="table-responsive">
<!--  <div class="form-group">
                    <label for="exampleInputEmail111">Alasan anda berhenti di perusahaan sebelumnya ?</label>
                     <textarea name="soal2" class="form-control" required></textarea>
 </div>
 -->
<?php if ($tampil['flag_inputan']=='N') {?>
<div class="form-group">
    <label for="exampleInputEmail111"> Deskripsi Aktiva</label>
         <input type="text" class="form-control" name="deskripsi_aktiva" placeholder="Masukan aktiva" required>
</div>

<?php } elseif ($tampil['flag_inputan']=='Y' ) {?>
<div class="form-group">
    <label for="exampleInputEmail111">Trx Type</label>
    <div class="input-group">
        <div class="input-group-prepend"></div>
            <select class="form-control" name="deskripsi_aktiva">
                <?php
                    echo "<option value=''>-- Pilih TrxType --</option>";
                    $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_subtrxtype where status='A' and kode_trxtype='$kode_trxtype'  ");
                    while ($datacek = $sql1->fetch_assoc()) {
                        echo "<option value ='$datacek[deskripsi_subtrxtype]'>$datacek[deskripsi_subtrxtype]</option>";
                    }
                ?>
                                                    
            </select>
        </div>
    </div>

<?php } 
elseif ($tampil['flag_inputan']=='N' and $kode_trxtype=='TRX000014') {?>

    <div class="form-group">
    <label for="exampleInputEmail111"> Periode Awal</label>
         <input type="month" class="form-control" name="periode_awal" placeholder="Masukan periode awal" required>
</div>
    <div class="form-group">
    <label for="exampleInputEmail111"> Periode Akhir</label>
         <input type="month" class="form-control" name="periode_akhir" placeholder="Masukan periode akhir" required>
</div>
<div class="form-group">
    <label for="exampleInputEmail111">Keterangan</label>
<div class="input-group">
    <div class="input-group-prepend"></div>
        <select class="form-control" name="deskripsi_aktiva">
            <?php
                echo "<option value=''>-- Pilih Keterangan --</option>";
                $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_subtrxtype where status='A' and kode_trxtype='TRX000015'  ");
                while ($datacek = $sql1->fetch_assoc()) {
                     echo "<option value ='$datacek[deskripsi_subtrxtype]'>$datacek[deskripsi_subtrxtype]</option>";
                }
            ?>
                                                
        </select>
     </div>
</div>
<?php }?>


</div>
                                
   
   

