<?php


$kode_modul = $_GET['kode_modul'];
$sql = $koneksi_master->query("select * from pb_role.tb_modul where kode_modul='$kode_modul'");


$tampil = $sql->fetch_assoc();
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Ubah Modul</h4>
              </div>
              <div class="card-body">
               
               
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <form method="POST" action="?page=modul&aksi=ubah_proses">

  
                    <input type="text" class="form-control" name="kode_modul" value="<?php echo $tampil['kode_modul']; ?>" hidden>

                <div class="form-group">
                    <label for="exampleInputEmail111">Nama Modul</label>
                    <input type="text" class="form-control" name="nama_modul" value="<?php echo $tampil['nama_modul']; ?>" required>
                </div>

             
                <div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                    <a href="?page=modul" class="btn btn-dark">Kembali</a>
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
