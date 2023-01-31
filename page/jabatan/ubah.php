<?php

$kode_jabatan = $_GET['kode_jabatan']; //untuk enkripsi di link agar user tidak bisa mengubah linknya


$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_jabatan . $pc) <> $oc) {
?>
  <script type="text/javascript">
    alert("Tidak dapat mengubah data")
    window.location.href = "logout.php";
  </script>
<?php
}



$sql = $koneksi_master->query("select * from pb_master.tb_jabatan_karyawan where kode_jabatan='$kode_jabatan'");


$tampil = $sql->fetch_assoc();
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Ubah Jabatan</h4>
          </div>
          <div class="card-body">


            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jabatan&aksi=ubah_proses">


                  <input type="text" class="form-control" name="kode_jabatan" value="<?php echo $tampil['kode_jabatan']; ?>" hidden>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $tampil['jabatan']; ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Manajerial</label>
                    <input type="text" class="form-control" name="manajerial" value="<?php echo $tampil['manajerial']; ?>" required>
                  </div>


                  <div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                    <a href="?page=jabatan" class="btn btn-dark">Kembali</a>
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