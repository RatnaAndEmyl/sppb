
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Laporan</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=duplicate_proses" enctype="multipart/form-data">
                 
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Gudang</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>

                      <select class="form-control" name="referensi" id="referensi">
                        <?php

                            echo "<option value='' >-- Pilih Gudang --</option>";
                            $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang a WHERE a.STATUS='A'");
                            while ($datacek = $sql1->fetch_assoc()) {
                            echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                            }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!--  -->
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Bulan</label><br>
                    
                    <input type="month" style="width: 200px;" name="pilih_tanggal" required>
                  </div>
                  <!--  -->

                  <div id="referensi_data"></div>
                  <!-- letaknya dibagian else js cari_data -->

                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  <a href="?page=jatuh_tempo&aksi=home_reminder_coba" class="btn btn-dark">Kembali</a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>