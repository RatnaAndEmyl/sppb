<?php $kode_trxtype         = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {

?>
<script type="text/javascript">
  alert("Tidak dapat mengubah data")
  window.location.href = "logout.php";

</script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where status = 'A' and kode_trxtype='$kode_trxtype'");
$tampil = $sql->fetch_assoc();
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Duplikat Data</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=duplicate_proses" enctype="multipart/form-data">
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Jatuh Tempo</label>
                      <input type="text" class="form-control" value="<?php echo $tampil['deskripsi']; ?>" readonly >
                  </div>

                  
                  <div class="form-group">
                      <input type="text" class="form-control" name="kode_trxtype_awal" value="<?php echo $kode_trxtype; ?>" id="kode_trxtype_awal" hidden >
                  </div>

                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Referensi Duplikat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>

                      <select class="form-control" name="referensi" id="referensi">
                        <?php

                            echo "<option value='' >-- Pilih Referensi --</option>";
                            $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype a inner join pb_master.tb_mapping_reminder b on a.kode_trxtype = b.kode_trxtype  WHERE b.STATUS='A' and a.kode_trxtype<>'$kode_trxtype'  ORDER BY b.kode_trxtype");
                            while ($datacek = $sql1->fetch_assoc()) {
                            echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                            }
                        ?>
                      </select>
                    </div>
                  </div>
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Jenis Duplikat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="jenis_duplikat" id="jenis_duplikat" required>
                        <option value="">-- Pilih Jenis Duplikat --</option>
                        <option value="kosongkan">Kosongkan Data (<?php echo $tampil['deskripsi']; ?>)</option>
                        <option value="ambil">Ambil Data Yang Tidak Ada</option>
                      </select>
                    </div>
                  </div>
                  <!--  -->
                  <div class="form-group">
                    <label for="exampleInputEmail111">Data Duplikat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="data_duplikat" id="data_duplikat" required>
                        <option value="">-- Pilih Data Duplikat --</option>
                        <option value="email">Email</option>
                        <option value="pengingat">Pengingat </option>
                        <option value="all">All</option>
                      </select>
                    </div>
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