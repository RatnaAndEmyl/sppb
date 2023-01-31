<?php
$angka = date('Ymdhis');
$nik = $_GET['nik'];

?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Tambah User</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=user&aksi=tambah_proses" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="exampleInputEmail111">Nama</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="nik">
                        <?php

                        echo "<option value='' selected disabled>-- Pilih Nama Karyawan --</option>";
                        $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_karyawan a WHERE a.status='A' and not exists (select x.nik from pb_role.tb_user x where x.nik=a.nik and x.status='A') ORDER BY a.nik");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[nik]'>$datacek[nama_karyawan]</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Masukan Password" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail111">Level</label>
                    <input type="text" class="form-control" name="level" placeholder="Masukan Level" required>
                  </div>


                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  <a href="?page=user" class="btn btn-dark">Kembali</a>

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