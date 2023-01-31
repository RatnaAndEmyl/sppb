    <?php
    $angka = date('Ymdhis');
    ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Daftar User</h4>
              </div>
              <div class="card-body">
                <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>
                
                <a href="?page=user&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

                <div class="table-responsive">
                  <br>
                  <table id="example1" class="table table-bordered table-hover">

                    <thead>
                      <tr>
                        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Kode User</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">NIK Karyawan</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Username</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Nama</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;

                      $sql = $koneksi_master->query("SELECT * FROM pb_role.tb_user where status='A' ORDER BY kode_user asc");
                      while ($data = $sql->fetch_assoc()) {

                      ?>
                        <tr>
                          <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                          <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_user']; ?></td>
                          <td style="text-align:center; vertical-align:middle;"><?php echo $data['nik']; ?></td>
                          <td style="text-align:center; vertical-align:middle;"><?php echo $data['username']; ?></td>
                          <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama']; ?></td>
                          <td style="text-align:center; vertical-align:middle;">
                            <a href="?page=user&aksi=ubah&kode_user=<?php echo $data['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_user'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                            <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=user&aksi=hapus&kode_user=<?php echo $data['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_user'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                          </td>
                        </tr>
                      <?php }  ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>