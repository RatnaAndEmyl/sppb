<?php
include "..\\..\\koneksi.php";

$adjustment = $_POST["adjustment"];
?>

<!-- <div class="table-responsive">
  <div class="table-responsive">
    <div class="form-group">
      <label for="exampleInputEmail111">Nama Barang</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text " id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
        </div>

        <select class="form-control select2" name="kode_barang" required>
          <?php
          echo "<option value='' selected disabled>-- Pilih Barang --</option>";
          // $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_barang WHERE STATUS='A' ORDER BY id_barang");

          $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_barang a INNER JOIN pb_master.tb_satuan c ON a.kode_satuan=c.kode_satuan WHERE a.STATUS='A' AND c.status='A' ORDER BY a.nama_barang ASC");

          while ($datacek = $sql1->fetch_assoc()) {
            echo "<option value ='$datacek[id_barang]'>$datacek[nama_barang] ($datacek[nama_satuan])</option>";
          }

          ?>

        </select>
      </div>
    </div>
  </div> -->

  <?php if ($adjustment == 'in') { ?>
    <div class="form-group">
      <label for="exampleInputEmail111">Stok Masuk</label>
      <input type="number" class="form-control" step="0.1" name="stok_in" placeholder="Isikan Stok Sistem Yang akan Ditambah">
    </div>

  <?php } else if ($adjustment == 'out') { ?>

    <div class="form-group">
      <label for="exampleInputEmail111">Stok Keluar</label>
      <input type="number" class="form-control" step="0.1" name="stok_out" placeholder="Isikan Stok Sistem Yang akan Dikurang">
    </div>
  <?php } ?>

</div>