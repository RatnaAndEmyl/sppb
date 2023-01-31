<?php

$kode_pengingat        = $_GET['kode_pengingat'];
$kode_trxtype        = $_GET['kode_trxtype'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype . $pc) <> $oc) {
?>
<script type="text/javascript">
  //     alert("Tidak dapat mengubah data")
  //    window.location.href = "logout.php";

</script>

<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pengingat where kode_pengingat='$kode_pengingat'");
$tampil = $sql->fetch_assoc();

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Ubah Pengingat</h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=p_ubah_proses" name="autoSumForm">
                  <!--  -->

                  <div class="form-group">
                    <label for="exampleInputEmail111">Aktiva</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="kode_aktiva" id="kode_aktiva">
                        <?php

                        echo "<option value='' >-- Pilih Aktiva --</option>";
                          $sql1 = $koneksi_master->query("SELECT a.kode_aktiva, a.deskripsi_aktiva, b.deskripsi_aktiva 'desk_detail' FROM pb_transaksi.tb_aktiva a  join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva WHERE a.STATUS='A' and b.kode_trxtype='TRX000004' ORDER BY kode_aktiva");
                          while ($datacek = $sql1->fetch_assoc()) {
                              
                            if ($datacek['kode_aktiva'] == $tampil['kode_aktiva']) {
                                echo "<option value ='$datacek[kode_aktiva]' selected >$datacek[deskripsi_aktiva]- $datacek[desk_detail]</option>";
                            } else {
                               echo "<option value ='$datacek[kode_aktiva]'>$datacek[deskripsi_aktiva]</option>";
                               }
                            }
                                                    
                        ?>
                      </select>
                    </div>
                  </div>
                  <!--  -->
                  <div>
                    <!-- <label for="exampleInputEmail111">Perulangan</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $tampil['ulang']; ?>"
                      name="ulang" hidden required>
                  </div>
                  <!--  -->
                  <?php if ($tampil['ulang'] == '1') { ?>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Tanggal</label>
                    <input type="date" class="form-control" name="start" value="<?php echo $tampil['start']; ?>"
                      required>
                  </div>
                  <!--  -->
                  <?php } else {?>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6">
                      <div class="form-group">
                        <label for="exampleInputEmail111">Mulai</label>
                        <input type="date" class="form-control" name="start" value="<?php echo $tampil['start']; ?>"
                          required>
                      </div>
                    </div>
                    <!--  -->
                    <div class="col-sm-6 col-xs-6">
                      <div class="form-group">
                        <label for="exampleInputEmail111">Selesai</label>
                        <input type="date" class="form-control" name="end" value="<?php echo $tampil['end']; ?>"
                          required>
                      </div>
                    </div>
                  </div>
                  <!--  -->
                  <div>
                    <!-- <label for="exampleInputEmail111">Periode</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $tampil['flag_periode']; ?>"
                      name="flag_periode" hidden required>
                  </div>

                  <?php if ($tampil ['flag_periode'] == 'D') { ?>
                        <div class="form-group">
                                <label for="exampleInputEmail111">Hari</label>
                                <div class="input-group">
                                <select class="form-control" name="periode[]" required>
                                    <option <?php if($tampil['periode']=='Minggu') {echo "selected";}?> value="Minggu">Minggu</option>
                                    <option <?php if($tampil['periode']=='Senin') {echo "selected";}?> value="Senin">Senin</option>
                                    <option <?php if($tampil['periode']=='Selasa') {echo "selected";}?> value="Selasa">Selasa</option>
                                    <option <?php if($tampil['periode']=='Rabu') {echo "selected";}?> value="Rabu">Rabu</option>
                                    <option <?php if($tampil['periode']=='Kamis') {echo "selected";}?> value="Kamis">Kamis</option>
                                    <option <?php if($tampil['periode']=='Jumat') {echo "selected";}?> value="Jumat">Jumat</option>
                                    <option <?php if($tampil['periode']=='Sabtu') {echo "selected";}?> value="Sabtu">Sabtu</option>
                                  </select>
                              </div>
                            </div>
                        
                      <!--  -->
                      <?php } else if ($tampil ['flag_periode'] == 'M') { ?>
                      <div class="form-group">
                        <label for="exampleInputEmail111">Pilih Mingguan</label>
                        <select class="form-control" name="periode[]" required>
                          <option <?php if($tampil['periode']=='Minggu') {echo "selected";}?> value="Minggu">Minggu</option>
                          <option <?php if($tampil['periode']=='Senin') {echo "selected";}?> value="Senin">Senin</option>
                          <option <?php if($tampil['periode']=='Selasa') {echo "selected";}?> value="Selasa">Selasa</option>
                          <option <?php if($tampil['periode']=='Rabu') {echo "selected";}?> value="Rabu">Rabu</option>
                          <option <?php if($tampil['periode']=='Kamis') {echo "selected";}?> value="Kamis">Kamis</option>
                          <option <?php if($tampil['periode']=='Jumat') {echo "selected";}?> value="Jumat">Jumat</option>
                          <option <?php if($tampil['periode']=='Sabtu') {echo "selected";}?> value="Sabtu">Sabtu</option>
                        </select>
                      </div>

                  <?php } else if ($tampil ['flag_periode'] == 'B') { ?>
                    <div class="form-group">
                      <label for="exampleInputEmail111"> Masukkan Tanggal</label>
                      <input type="number" min = '1' max = '31' class="form-control" name="periode[]" value="<?php echo $tampil['periode']; ?>" required>
                  </div>

                  <?php } else if ($tampil ['flag_periode'] == 'T') { ?>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail111"> Masukkan Tahun</label>
                      <input type="date" class="form-control" name="periode[]" value="<?php echo $tampil['periode']; ?>" required>
                  </div>

                  <?php } else if ($tampil ['flag_periode'] == 'C') { ?>
                    <div class="form-group">
                      <label for="exampleInputEmail111"> Masukkan Counter</label>
                      <input type="number" class="form-control" name="periode[]" value="<?php echo $tampil['periode']; ?>" required>
                  </div>
                      
                  <?php } ?>

                  <?php } ?>
                  <!-- punya else 2 -->

                  <div class="form-group">
                    <!-- <label for="exampleInputEmail111"> Kode Trxtype</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $kode_trxtype ?>"
                      name="kode_trxtype" hidden  >
                  </div>

                  <div class="form-group">
                    <!-- <label for="exampleInputEmail111"> Kode Trxtype</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $kode_pengingat ?>"
                      name="kode_pengingat" hidden required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111"> Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" value="<?php echo $tampil['deskripsi']; ?>"
                      required>
                  </div>

                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  <a href="?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>"
                    class="btn btn-dark" class="btn btn-dark">Kembali</a>

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
