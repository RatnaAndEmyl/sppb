<?php
$angka = date('Ymdhis');
$kode_sppb = $_GET['kode_sppb'];

$tanggal_sppb = date('Y-m-d');

$sql_count_gudang = $koneksi_master->query("SELECT COUNT(kode_gudang) 'jumlah' FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang WHERE a.status='A'  AND kode_user='$kode_user' AND b.status='A'");
$tampil_count_gudang = $sql_count_gudang->fetch_assoc();

$jumlah_gudang =  $tampil_count_gudang['jumlah'];


if ($jumlah_gudang == 1) {
  $status_input = 'disabled';

  $sql_disabled_query = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' AND kode_gudang in (select a.kode_gudang FROM pb_master.tb_mapping_usergudang a inner join pb_master.tb_mapping_usergudang_detail b on a.kode_mapping_usergudang=b.kode_mapping_usergudang where a.status='A' AND b.status='A' AND b.kode_user='$kode_user') ORDER BY kode_gudang");
  $tampil_sql_disabled_query = $sql_disabled_query->fetch_assoc();
  $kode_gudang_disabled =  $tampil_sql_disabled_query['kode_gudang'];

} elseif ($jumlah_gudang > 1) {
  $status_input = 'required';
} elseif ($jumlah_gudang == 0) { ?>
  <script type="text/javascript">
    alert("Anda Tidak Punya Akses")
    window.location.href = "?page=home";
  </script>
<?php } ?>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Tambah SPPB Barang</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-xs-12">
                <form method="POST" action="?page=sppb&aksi=tambah_proses" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputEmail111">Nama</label>
                    <input type="text" class="form-control" readonly value="<?php echo $nama ?>" name="username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Jabatan</label>
                    <input type="text" class="form-control" readonly value="<?php echo $jabatan ?>" name="jabatan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail111">Tanggal SPPB</label>
                    <input type="date" class="form-control" readonly value="<?php echo $tanggal_sppb ?>" name="tanggal_sppb" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputEmail111">Gudang</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="kode_gudang">
                        <?php

                        echo "<option value='' selected disabled>-- Pilih Gudang --</option>";
                        $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' ORDER BY kode_gudang");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <label for="exampleInputEmail111">Gudang</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                      </div>
                      <select class="form-control" name="kode_gudang" id="kode_gudang" <?php echo $status_input ?>>
                        <?php

                        if ($jumlah_gudang > 1) {
                          echo "<option value='' selected disabled>-- Pilih Gudang --</option>";
                        }
                        $sql1 = $koneksi_master->query("SELECT * FROM pb_master.tb_gudang WHERE STATUS='A' AND kode_gudang IN (SELECT a.kode_gudang FROM pb_master.tb_mapping_usergudang a INNER JOIN pb_master.tb_mapping_usergudang_detail b ON a.kode_mapping_usergudang=b.kode_mapping_usergudang WHERE a.status='A' AND b.status='A' AND b.kode_user='$kode_user') ORDER BY kode_gudang");
                        while ($datacek = $sql1->fetch_assoc()) {
                          echo "<option value ='$datacek[kode_gudang]'>$datacek[nama_gudang]</option>";
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <?php if ($jumlah_gudang == 1) { ?>
                    <input type="text" name="kode_gudang" value="<?php echo $kode_gudang_disabled; ?>" hidden>
                  <?php } ?>


                  <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">

                  <a href="?page=sppb" class="btn btn-dark">Kembali</a>

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

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function() {
    var today = new Date();
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    var day = ('0' + today.getDate()).slice(-2);
    var year = today.getFullYear();
    var date = year + '-' + month + '-' + day;
    $('[id*=txtdateofreservation]').attr('min', date);
  });
</script> -->