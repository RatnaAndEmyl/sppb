<?php 
 include "..\\..\\koneksi.php";

 if ($_POST['value']<>''){ 
    $value = $_POST["value"];           
 } 
 
$tanggal_awal = date('Y-m-d');
$tanggal_akhir = $_POST["tgl_jatuh_tempo"];
 //echo $tanggal_akhir;

?>

<input type="text" class="form-control" id="tanggal_jatuh_tempo" value="<?php echo $tanggal_akhir;?>" hidden>

<div class="table-responsive" id="table-responsive">
  <?php if ($value == '1'){ ?>
  <div class="form-group">
    <label for="exampleInputEmail111">Tanggal</label>
    <input type="date" class="form-control" name="start" min="<?php echo $tanggal_awal;?>" max="<?php echo $tanggal_akhir;?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail111">Jam</label>
    <input type="time" class="form-control" name="time" required>
  </div>

  <?php } else if ($value == '2'){ ?>


  <div class="card-body">
 
      
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail111">Mulai </label>
              <input type="date"  name="start" class="form-control" min="<?php echo $tanggal_awal;?>" max="<?php echo $tanggal_akhir;?>" required>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInputEmail111">Selesai</label>
              <input type="date" class="form-control" name="end" min="<?php echo $tanggal_awal;?>" max="<?php echo $tanggal_akhir;?>" required>
            </div>
          </div>
        </div>
        
      <div class="form-group">
        <label for="exampleInputEmail111">Periode</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
          </div>
          <select class="custom-select" name="flag_periode" id="periode">
            <option selected>Pilih Periode</option>
            <option value="HARIAN">Harian</option>
            <option value="MINGGUAN">Mingguan</option>
            <option value="BULANAN">Bulanan</option>
            <!-- <option value="TAHUNAN">Tahunan</option> -->
            <option value="COUNTER">Counter</option>
          </select>
        </div>
      </div>

    <div class="table-responsive" id="view_p_perulangan"></div>

    <div class="form-group">
      <label for="exampleInputEmail111">Jam</label>
      <input type="time" class="form-control" name="time" required>
  </div>

  </div>
  <!-- punya card body -->
  <?php } ?>
  <!-- punya else if value == '2' -->

</div>

<script>
  $("#periode").change(function () {
    var periode = $("#periode").val();
    var tanggal_jatuh_tempo = $("#tanggal_jatuh_tempo").val(); //digunakan untuk dipanggil di view_p_perulangan pada bagian pendeklarasian
    // alert(periode);

    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/view_p_perulangan.php",
      data: "periode=" + periode + "&tanggal_jatuh_tempo=" + tanggal_jatuh_tempo,
      success: function (msg) {

        if (msg == '') {
          var div = document.getElementById('table-responsive');
          div.remove();
        } else {
          $("#view_p_perulangan").html(msg);
        }

        $("#imgLoad").hide();
      }
    });
  });
</script>
<!-- untukn memanggil table input bagian periode (hari, bulan dll.) -->
