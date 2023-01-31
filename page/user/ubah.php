<?php

$kode_user = $_GET['kode_user']; //untuk enkripsi di link agar user tidak bisa mengubah linknya

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_user . $pc) <> $oc) {
?>
  <script type="text/javascript">
    alert("Tidak dapat mengubah data")
    window.location.href = "logout.php";
  </script>
<?php
}



$sql = $koneksi_master->query("SELECT * FROM pb_role.tb_user WHERE kode_user='$kode_user'");
$tampil = $sql->fetch_assoc();

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Ubah User</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=user&aksi=ubah_proses">

                  <input type="text" class="form-control" name="kode_user" value="<?php echo $tampil['kode_user']; ?>" hidden>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="custom-select col-12" name="nik">
                        <?php
                        $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_karyawan WHERE STATUS='A' ORDER BY nik");
                        while ($data = $sql->fetch_assoc()) {
                          if ($data['nik'] == $tampil['nik']) {
                            echo "<option value ='$data[nik]' selected >$data[nama_karyawan]</option>";
                          } else {
                            echo "<option value ='$data[nik]'>$data[nama_karyawan]</option>";
                          }
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $tampil['username']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Password</label>
                    <input type="text" class="form-control" name="password" value="<?php echo $tampil['password']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Level</label>
                    <input type="text" class="form-control" name="level" value="<?php echo $tampil['level']; ?>" required>
                  </div>

                  <div>
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