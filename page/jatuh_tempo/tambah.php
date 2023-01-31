<?php
$kode_trxtype        = $_GET['kode_trxtype'];
$kode_aktiva        = $_GET['kode_aktiva'];

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

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva_detail where kode_trxtype='$kode_trxtype'");
$tampil = $sql->fetch_assoc();
// echo $tampil ['kode_trxtype'] ;
?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <?php if ($kode_trxtype == 'TRX000014'){?>
          <div class="card-header">
            <h4 class="card-title">Tambah Periode</h4>
          </div>
          <?php } else {?>
          <div class="card-header">
            <h4 class="card-title">Tambah Jatuh Tempo</h4>
          </div>
          <?php }?>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=tambah_proses" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="exampleInputEmail111">Aktiva</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control select2" name="kode_aktiva" id="kode_aktiva">
                        <?php
                          if ($kode_trxtype == 'TRX000014') {
                              echo "<option value='' >-- Pilih Aktiva --</option>";
                              $sql1 = $koneksi_master->query("SELECT a.kode_aktiva, a.deskripsi_aktiva, b.deskripsi_aktiva 'desk_detail' FROM pb_transaksi.tb_aktiva a  join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva and not exists (select x.kode_aktiva from pb_transaksi.tb_aktiva_detail x where x.kode_aktiva=a.kode_aktiva and x.kode_trxtype= '".$tampil ['kode_trxtype']."' and x.status='A' and a.status='A' and x.periode_awal is not null and x.periode_akhir is not null )
                                                
                              WHERE a.STATUS='A' and b.STATUS='A' and b.kode_trxtype='TRX000004' ORDER BY a.kode_aktiva");
                              
                              } else {
                                                    
                              echo "<option value='' >-- Pilih Aktiva --</option>";
                              $sql1 = $koneksi_master->query("SELECT a.kode_aktiva, a.deskripsi_aktiva, b.deskripsi_aktiva 'desk_detail' FROM pb_transaksi.tb_aktiva a  join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva and not exists(select x.kode_aktiva, x.kode_trxtype from pb_transaksi.tb_aktiva_detail x where x.kode_aktiva=a.kode_aktiva and x.kode_trxtype= '".$tampil ['kode_trxtype']."' and x.status='A' and a.status='A' and x.tgl_jatuh_tempo is not null)
                                                
                              WHERE a.STATUS='A' and b.STATUS='A' and b.kode_trxtype='TRX000004' ORDER BY a.kode_aktiva");
                               }
                              while ($datacek = $sql1->fetch_assoc()) {
                              echo "<option value ='$datacek[kode_aktiva]'>$datacek[deskripsi_aktiva] - $datacek[desk_detail]</option>";
                                                
                             }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail111"> Kode Trxtype</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $kode_trxtype ?>"
                      name="kode_trxtype" hidden>
                  </div>

                  <?php if ($kode_trxtype=='TRX000014') {?>
                  <div class="form-group">
                    <label for="exampleInputEmail111"> Periode Awal</label>
                    <input type="month" class="form-control" name="periode_awal" placeholder="Masukan periode awal"
                      >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111"> Periode Akhir</label>
                    <input type="month" class="form-control" name="periode_akhir" placeholder="Masukan periode akhir"
                      >
                  </div>

                  <?php } else {?>
                  <div class="form-group">
                  
                    <label for="exampleInputEmail111"> Jatuh Tempo</label>
                    <input type="date" class="form-control" name="tgl_jatuh_tempo" required>
                  </div>
                  <?php }?>
                  <div class="form-group">
                    <label for="exampleInputEmail111"> Keterangan</label>
                    <!-- <input type="text" class="form-control" name="deskripsi_aktiva"
                                            placeholder="Masukan data" required> -->
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
</div>
                      <select class="form-control select2" name="deskripsi_aktiva">
                        <?php
                            echo "<option value=''>-- Pilih Keterangan --</option>";
                            $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_subtrxtype where status='A' and kode_trxtype='TRX000015'  ");
                            while ($datacek = $sql1->fetch_assoc()) {
                              echo "<option value ='$datacek[deskripsi_subtrxtype]'>$datacek[deskripsi_subtrxtype]</option>";
                            }
                        ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Jenis File</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control">
                        <option selected>-- Pilih File --</option>
                        <option value="1">STNK</option>
                        <option value="2">POLIS ASURANSI</option>
                        <option value="3">KIR</option>
                        <option value="4">PAJAK</option>
                        <option value="5">Lainnya</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="file" class="form-control"><br>
                    <!-- <input type="submit" name="upload" value="Upload"> -->
                  </div>

                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  <a href="?page=home&halaman=1"
                    class="btn btn-dark" class="btn btn-dark">Kembali</a>
                  <!-- <a href="?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>"
                    class="btn btn-dark" class="btn btn-dark">Kembali</a> -->

              
              </form>
            </div>
          </div>
        </div>

      </div> <!-- card primary -->
    </div>
  </div>
  </div>
</section>
