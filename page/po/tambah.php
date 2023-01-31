<?php
$angka = date('Ymdhis');
// $kode_po = $_GET['kode_po'];
$tanggal_po = date('Y-m-d');

?>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Tambah PO Barang</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=po&aksi=tambah_proses" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail111">Nama</label>
                    <input type="text" class="form-control" readonly value="<?php echo $nama ?>" name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Jabatan</label>
                    <input type="text" class="form-control" readonly value="<?php echo $jabatan ?>" name="jabatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Tanggal PO</label>
                    <input type="date" class="form-control" name="tanggal_po" placeholder="tanggal_po" value="<?php echo $tanggal_po; ?>" required readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Suplier</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="kode_suplier" required>
                        <?php

                        echo "<option value='' selected disabled>-- Pilih Suplier --</option>";
                        $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_suplier WHERE STATUS='A' ORDER BY kode_suplier");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_suplier]'>$datacek[nama_suplier]</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail111">Gudang</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="kode_gudang" required>
                        <?php

                        echo "<option value='' selected disabled>-- Pilih Gudang --</option>";
                        $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' ORDER BY kode_gudang");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  <a href="?page=po" class="btn btn-dark">Kembali</a>

              </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  </div>
</section>