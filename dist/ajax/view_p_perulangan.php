<?php 
 include "..\\..\\koneksi.php";
 
$flag_periode = $_POST["periode"];
// $flag_bulan = $_POST["flag_bulan"];
 
// echo $flag_periode;
$tanggal_awal = date('Y-m-d');
$tanggal_akhir = $_POST["tanggal_jatuh_tempo"];
//  echo $tanggal_akhir;
?>

<div class="table-responsive" id="table-responsive">
  <?php if ($flag_periode == 'HARIAN') {?>
    <div class="select2-primary">
                    <div class="form-group">
                      <label for="exampleInputEmail111">Hari</label>
                      <div class="input-group">
                      <!-- <div class="input-group-prepend"> -->
                      <!-- <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div> -->
                      
                        <select class="select2" multiple="multiple" data-placeholder="Pilih Hari"
                          data-dropdown-css-class="select2-primary" style="width: 100%;" name="periode[]">
                            <option value="Minggu">Minggu</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                      
                    </div>
                  </div>
    </div>

  <?php } else if ($flag_periode == 'MINGGUAN') {?>
            <div class="form-group">
                <label for="exampleInputEmail111">Pilih Mingguan</label>
                <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>                            
                        <select class="form-control" name="periode[]" >
                            <option selected disabled>-- Pilih Hari --</option>
                            <option value="Minggu">Minggu</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
            </div>

  <?php } else if ($flag_periode == 'BULANAN') {?>
      <div class="form-group">
            <label for="exampleInputEmail111">Pilih Sistem</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span></div>                            
                    <select class="form-control" name="flag_bulan" >
                        <option selected disabled>-- Pilih sistem --</option>
                        <option value="AWAL">Mulai Dari Awal Bulan</option>
                        <option value="AKHIR">Mulai Dari Akhir Bulan</option>
                    </select>
                </div>
            </div>
  
            <div class="form-group">
                <label for="exampleInputEmail111">Masukkan Jumlah Hari</label>
                <input type="number" min='1' max ='30' class="form-control" name="periode[]" required>
            </div>

  <!-- <?php } else if ($flag_periode == 'TAHUNAN') {?>
    
      <div class="form-group">
            <label for="exampleInputEmail111">Tahun</label>
            <input type="date"  class="form-control" name="periode[]" min="<?php echo $tanggal_awal;?>" max="<?php echo $tanggal_akhir;?>" required>
      </div> -->

<?php } else if ($flag_periode == 'COUNTER') {?>
            <div class="form-group">
            <label for="exampleInputEmail111">Isi counter (Hitungan Hari Sebelum Jatuh Tempo)</label>
            <input type="number" class="form-control" name="periode[]" required>
            </div>
<?php } ?>
</div>
</div>
<!--  -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
