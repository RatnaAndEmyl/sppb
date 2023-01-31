<?php

// $kode_pengingat        = $_GET['kode_pengingat'];
$kode_trxtype        = $_GET['kode_trxtype'];
// $kode_aktiva        = $_GET['kode_aktiva'];
// $kode_email        = $_GET['kode_email'];

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

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where kode_trxtype='$kode_trxtype'");
$tampil = $sql->fetch_assoc();

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Tambah Tujuan Pengiriman</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=jatuh_tempo&aksi=pe_tambah_proses" enctype="multipart/form-data">

                  <div>
                    <!-- <label for="exampleInputEmail111"> Kode Trxtype</label> -->
                    <input type="text" class="form-control" readonly value="<?php echo $kode_trxtype?>"
                      name="kode_trxtype" hidden required>
                  </div>
                  <div class="select2-primary">
                    <div class="form-group">
                      <label for="exampleInputEmail111">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend"></div>
                        <select class="select2" multiple="multiple" data-placeholder="Pilih Email"
                          data-dropdown-css-class="select2-primary" style="width: 100%;" name="kode_email[]"
                          id="kode_email">
                          <?php
                           echo "<option value=''>-- Pilih Email --</option>";
                           $sql2 = $koneksi_master->query("SELECT * FROM pb_master.tb_email a 
                          WHERE a.STATUS='A' and not exists (select x.kode_email from pb_transaksi.tb_pengingat_email x 
                          where x.kode_email=a.kode_email and x.kode_trxtype='$kode_trxtype' and x.status='A') ORDER BY a.kode_email");
                          while ($datacek = $sql2->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_email]'>$datacek[email] - ( $datacek[pengguna] )</option>";
                          } ?>
                        </select>
                      </div>
                    </div>
                  </div>

              
              <div>
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
</section>
