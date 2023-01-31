<?php 
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$menu = '';
$limit = $_SESSION['s_limit'];
$halaman = (isset($_GET['halaman'])) ? (int) $_GET['halaman'] : 1;
$limitStart = ($halaman - 1) * $limit;

// $sql_count_status_selain_a = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan<>'A' AND kode_permintaan='$kode_permintaan'");
// $tampil_count_status_selain_a = $sql_count_status_selain_a->fetch_assoc();

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <h5 align="center"><b>SELAMAT DATANG
            <?= $nama; ?>
            DI WEBSITE SNI</b></h5>
        <H6 align="center">ANDA MASUK SEBAGAI
          <?= $level; ?> </H6><br>


        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                <div class="row">

                  <div class="col-md-4" style=" padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px; text-align:right;">Tempo</label>
                      <select class="custom-select" id="pilih_jatuh_tempo" name="pilih_jatuh_tempo" style="width: 200px;" required>

                        <?php

                        $sql1 = $koneksi_master->query("SELECT * from pb_master.tb_trxtype a where a.status='A' and exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.status='A' and a.kode_trxtype=x.kode_trxtype) ORDER BY a.kode_trxtype asc");
                        while ($datacek = $sql1->fetch_assoc()) {

                          if ($_SESSION['s_pilih_jatuh_tempo'] == $datacek['deskripsi']) {
                            echo "<option value ='$datacek[deskripsi]' selected>$datacek[deskripsi]</option>";
                          } else {
                            echo "<option value ='$datacek[deskripsi]'>$datacek[deskripsi]</option>";
                          }
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4" style="padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 90px">Bulan</label>

                      <input type="month" id="pilih_tanggal_home" style="width: 200px;" name="pilih_tanggal"
                        value="<?php echo $_SESSION['s_pilih_tanggal'];  ?>" required>
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-md-4" style="padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 90px">Reminder</label>

                      <input type="month" id="pilih_tanggal_home" style="width: 200px;" name="pilih_tanggal"
                        value="<?php echo $_SESSION['s_pilih_tanggal'];  ?>" required>
                    </div>
                  </div>
                  <!--  -->
                  <div class="col-md-4" style=" padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 90px; text-align:right;">Pengguna</label>
                      <select class="custom-select" id="pilih_pengguna_mobil" name="pilih_pengguna_mobil"
                        style="width: 200px;" required>

                        <?php

                        $sql1 = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a where a.kode_trxtype = 'TRX000005' ORDER BY a.kode_trxtype ASC");
                        while ($datacek = $sql1->fetch_assoc()) {

                            if ($_SESSION['s_pilih_pengguna_mobil'] == $datacek['deskripsi_aktiva']) {
                                echo "<option value ='$datacek[deskripsi_aktiva]' selected>$datacek[deskripsi_aktiva]</option>";
                            } else {
                                echo "<option value ='$datacek[deskripsi_aktiva]'>$datacek[deskripsi_aktiva]</option>";
                            }
                        }

                        ?>

                      </select>
                    </div>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">DAFTAR REMINDER 
              <!--  -->
            </h3>
          </div>

          <div class="card-body">
            <?php
              $sqltext = "SELECT * FROM pb_transaksi.tb_pengingat_detail where status='A'";


              // $sqltext = $sqltext . " where a.status='A' ";

              // if ($level == 'USER') {
              //     $sqltext = $sqltext . "and a.nik='$nik_login' ";
              // }
              // if ($level == 'SUPERVISOR') {
              //     $sqltext = $sqltext . "and c.kode_departemen='$kode_departemen' ";
              // }



              // $sqltext = $sqltext . " AND '" .  $_SESSION['s_pilih_tanggal'] . "' = date_format (a.tanggal,'%Y-%m') 
              // AND c.nama = '$_SESSION[s_pilih_pengguna]'
              // AND a.status_permintaan ='$_SESSION[s_status_permintaan]'
              // AND b.nama_gudang ='$_SESSION[s_pilih_gudang]'
              // AND d.nama_departemen = '$_SESSION[s_pilih_departemen]'";

              // if ($level == 'SUPERVISOR') {
              //     // jangan tampilkan, jika kode_permintaan tidak ada di pb_transaksi.tb_permintaan_detail pakai exists, jika sebaliknya pakai not exists
              //     $sqltext = $sqltext . "and exists(select x.* from pb_transaksi.tb_permintaan_detail x where x.kode_permintaan=a.kode_permintaan) ";
              // }

              $sqlpaging = $sqltext;
              $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;
              $sql = $koneksi_master->query($sqltext);
              $no = $limitStart + 1;
              // $color_bg = '#FFFFFF';

              $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

              //Hitung semua jumlah data yang berada pada tabel Sisawa
              $JumlahData = mysqli_num_rows($SqlQuery);
              ?>
              <?php if ($JumlahData == 0) {
                $posisi = 'center';
              } else {
                $posisi = 'right';
              }

              ?>

              <div class="col-sm-12" style="text-align:<?php echo $posisi ?>; padding-bottom:10px;">
                <?php
                if ($JumlahData > 0) { ?>
                  <select class="custom-select" id="limit" style="width: 60px;" name="limit" required>
                    <option value="5" <?php if ($_SESSION['s_limit'] == '5') {
                                        echo 'selected';
                                      } ?>>5</option>
                    <option value="10" <?php if ($_SESSION['s_limit'] == '10') {
                                          echo 'selected';
                                        } ?>>10</option>
                    <option value="25" <?php if ($_SESSION['s_limit'] == '25') {
                                          echo 'selected';
                                        } ?>>25</option>
                    <option value="50" <?php if ($_SESSION['s_limit'] == '50') {
                                          echo 'selected';
                                        } ?>>50</option>
                  </select>
                  <?php
                  // Jika page = 1, maka LinkPrev disable
                  if ($halaman == 1) {
                  ?>
                    <!-- link Previous halaman disable -->
                    <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
                  <?php
                  } else {
                    $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                  ?>
                    <!-- link Previous Page -->
                    <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                  <?php
                  }
                  ?>
                  <?php

                  // Hitung jumlah halaman yang tersedia
                  $jumlahPage = ceil($JumlahData / $limit);
                  if ($halaman > $jumlahPage + 1) { ?><script>
                      window.location.href = "?page=home&halaman=1";
                    </script> <?php }

                            // Jumlah link number 
                            $jumlahNumber = 1;

                            // Untuk awal link number
                            $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

                            // Untuk akhir link number
                            $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

                            for ($i = $startNumber; $i <= $endNumber; $i++) {
                              $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
                              ?>
                    <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                  <?php
                            }
                  ?>

                  <!-- link Next Page -->
                  <?php
                  if ($halaman == $jumlahPage) { ?>
                    <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                  <?php
                  } else {
                    $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                  ?>
                    <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                <?php
                  }
                  $awal = (($halaman - 1) * $limit) + 1;

                  $akhir = (($halaman - 1) * $limit) + $limit;
                  if ($akhir > $JumlahData) {
                    $akhir = $JumlahData;
                  }
                } else {
                  echo 'Tidak ada data.';
                }
                ?>
              </div>

              <?php
              while ($data = $sql->fetch_assoc()) {
                // $status_permintaan = '-';
                // if ($data['status_permintaan'] == 'A') {
                //     $status_permintaan = 'Perlu Persetujuan' and $color = 'bg-warning';
                //     $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='A' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                //     $tampil_count_status = $sql_count_status->fetch_assoc();
                //     $status = 'Barang Perlu Persetujuan' and $colortext = 'text-orange';
                // } elseif ($data['status_permintaan'] == 'Y') {
                //     $status_permintaan = 'Sudah Disetujui' and $color = 'bg-success';
                //     $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='Y' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                //     $tampil_count_status = $sql_count_status->fetch_assoc();
                //     $status = 'Barang Telah Disetujui' and $colortext = 'text-success';
                // } elseif ($data['status_permintaan'] == 'X') {
                //     $status_permintaan = 'Ditolak!' and $color = 'bg-danger';
                //     $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_permintaan) 'jumlah' FROM pb_transaksi.tb_permintaan_detail WHERE status='A' AND status_permintaan='N' AND kode_permintaan='" . $data['kode_permintaan'] . "'");
                //     $tampil_count_status = $sql_count_status->fetch_assoc();
                //     $status = 'Barang Ditolak' and $colortext = 'text-danger';
                // }
              ?>

                <!-- <div class="col-sm-12" style="padding: 4px; background-color:bg-white;"> -->
                <div class="card col-sm-12 shadow p-2 mb-4 bg-body" style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: 	#F5F5F5;">
                  <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; background-color: #B0C4DE;">
                    <h6><strong><?php echo strtoupper(strftime("%A, %d %B %Y", strtotime($data['tanggal']))); ?></strong></h6>
                    <!-- <h6><strong><?php echo $data['nama']; ?></strong></h6> -->
                  </div>
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="shadow p-2 mb-3 ribbon bg- <?php echo $color ?>">
                      <!-- <?php echo '<b>' .  $status_permintaan . '</b>'; ?> </div> -->
                  </div>

                  <form class="form-horizontal">
                    <div class="form-body">
                      <div class="card-body">

                       

                          

                          
                        </div>
                      </div>
                    </div>
                  </form>

                </div>
                <!-- </div> -->
              <?php }
              if ($JumlahData > 0) {
                echo '<br>Menampilkan ' . $awal . ' sampai ' . $akhir . ' dari total ' . $JumlahData . ' data.';
              }
              ?>

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>

      <?php
      if ($JumlahData > 0) { ?>
        <div class="col-sm-12" style="text-align:center">

          <?php

          // Jika page = 1, maka LinkPrev disable
          if ($halaman == 1) {
          ?>
            <!-- link Previous halaman disable -->
            <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
          <?php
          } else {
            $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
          ?>
            <!-- link Prev Page -->
            <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
          <?php
          }
          ?>

          <?php
          $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);

          //Hitung semua jumlah data yang berada pada tabel Sisawa
          $JumlahData = mysqli_num_rows($SqlQuery);

          // Hitung jumlah halaman yang tersedia
          $jumlahPage = ceil($JumlahData / $limit);

          // Jumlah link number 
          $jumlahNumber = 1;

          // Untuk awal link number
          $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

          // Untuk akhir link number
          $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;

          for ($i = $startNumber; $i <= $endNumber; $i++) {
            $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
          ?>
            <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php
          }
          ?>

          <!-- link Next Page -->
          <?php
          if ($halaman == $jumlahPage) {
          ?>
            <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
          <?php
          } else {
            $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
          ?>
            <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
          <?php
          }

          ?>
        </div>
      <?php } ?>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->