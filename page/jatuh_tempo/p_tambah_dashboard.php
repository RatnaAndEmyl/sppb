<?php

$kode_trxtype        = $_GET['kode_trxtype'];
$kode_aktiva        = $_GET['kode_aktiva'];

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

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where kode_trxtype='$kode_trxtype'");
$tampil = $sql->fetch_assoc();

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Tambah Pengingat</h4>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=p_tambah_proses" enctype="multipart/form-data">

                  <input type="text" class="form-control" id="kode_trxtype_awal" value="<?php echo $kode_trxtype ?>" name="kode_trxtype" hidden>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Aktiva</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>

                      <select class="form-control" name="kode_aktiva" id="jatuh_tempo" readonly>
                        <?php
                        $sql1 = $koneksi_master->query("SELECT a.kode_aktiva, a.deskripsi_aktiva, b.deskripsi_aktiva 'desk_detail' FROM pb_transaksi.tb_aktiva a  join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva WHERE a.STATUS='A' and b.kode_trxtype='TRX000004' and a.kode_aktiva='".$kode_aktiva."' ORDER BY kode_aktiva");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_aktiva]'>$datacek[deskripsi_aktiva] ($datacek[desk_detail])</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="table-responsive" id="view_jatuh_tempo" style="width: 100%;"></div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail111">Perulangan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="ulang" id="value">
                        <option selected>-- Pilih Perulangan --</option>
                        <option value="1">1 Kali</option>
                        <option value="2">Berulang</option>
                      </select>
                    </div>
                  </div>

                  <div class="table-responsive" id="view_periode" style="width: 100%;"></div>

                  <div class="form-group">
                    <label for="exampleInputEmail111"> Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail111"> Kode Trxtype</label>
                    <input type="text" class="form-control" readonly value="<?php echo $kode_trxtype ?>"
                      name="kode_trxtype" hidden required>
                  </div> -->

                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                  
                  <a href="?page=home" class="btn btn-dark" class="btn btn-dark">Kembali</a>

              
              </form>
            </div>
          </div>



        </div>
      </div>
    </div>

  </div>
  </div>
</section>