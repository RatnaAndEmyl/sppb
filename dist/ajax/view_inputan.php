<?php
include "..\\..\\koneksi.php";


if ($_POST['ulang'] <> '') {
  $ulang = $_POST["ulang"];
}

?>

<div class="table-responsive" id="table-responsive">
  <?php if ($ulang == '1') { ?>
    <div class="form-group">
      <label for="exampleInputEmail111">Nama Karyawan</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
        </div>
        <select class="form-control" name="nik">
          <?php

          echo "<option value='' selected disabled>-- Pilih Nama --</option>";
          $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan a and not exists (SELECT b.nik FROM pb_role.tb_user b WHERE a.nik=a.nik AND a.status='A' AND b.status='A' AND b.nik='$nik') ORDER BY nik");
          while ($datacek = $sql1->fetch_assoc()) {
            echo "<option value ='$datacek[nik]'>$datacek[nama_karyawan]</option>";
          }

          ?>
        </select>
      </div>
    </div>

  <?php } else if ($ulang == '2') { ?>
      <div class="form-group">
        <label for="exampleInputEmail111">Nama Suplier</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
          </div>
          <select class="form-control" name="kode_suplier">
            <?php

            echo "<option value='' selected disabled>-- Pilih Nama --</option>";
            $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier WHERE STATUS='A' ORDER BY kode_suplier");
            while ($datacek = $sql1->fetch_assoc()) {
              echo "<option value ='$datacek[kode_suplier]'>$datacek[nama_suplier]</option>";
            }

            ?>
          </select>
        </div>
      </div>

      <div class="table-responsive" id="view_p_perulangan"></div>

    </div>
    <!-- punya card body -->
  <?php } ?>
  <!-- punya else if ulang == '2' -->

</div>

<!-- <script>
  $("#periode").change(function() {
    var periode = $("#periode").val();
    var tanggal_jatuh_tempo = $("#tanggal_jatuh_tempo").val(); //digunakan untuk dipanggil di view_p_perulangan pada bagian pendeklarasian
    // alert(periode);

    $.ajax({
      type: "POST",
      dataType: "html",
      url: "dist/ajax/view_p_perulangan.php",
      data: "periode=" + periode + "&tanggal_jatuh_tempo=" + tanggal_jatuh_tempo,
      success: function(msg) {

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
</script> -->
<!-- untukn memanggil table input bagian periode (hari, bulan dll.) -->