<?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

$menu = '';
$limit = $_SESSION['s_limit'];
$halaman = (isset($_GET['halaman'])) ? (int) $_GET['halaman'] : 1;
$limitStart = ($halaman - 1) * $limit;

// echo $_SESSION['s_nik'] . '<br>';

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h5 align="center"><b>SELAMAT DATANG <?= $nama; ?> DI WEBSITE SNI</b></h5>
        <H6 align="center">ANDA MASUK SEBAGAI <?= $level; ?></H6><br>

        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="table-responsive"
                style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
                <div class="row">

                  <!-- <div class="col-md-4" style="padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 120px">Dashboard</label>

                      <select class="custom-select" id="dashboard" style="width: 200px;" name="dashboard" required>
                        <option value="1" <?php if ($_SESSION['s_dashboard'] == '1') {
                                                                        echo 'selected';
                                                                    } ?>>LOKER</option>
                        <option value="2" <?php if ($_SESSION['s_dashboard'] == '2') {
                                                                        echo 'selected';
                                                                    } ?>>gudang</option>
                        <option value="3" <?php if ($_SESSION['s_dashboard'] == '3') {
                                                                        echo 'selected';
                                                                    } ?>>DATA MASTER</option>
                        <option value="4" <?php if ($_SESSION['s_dashboard'] == '4') {
                                                                        echo 'selected';
                                                                    } ?>>LAPORAN</option>
                      </select>
                    </div>
                  </div> -->

                  <div class="col-md-4" style=" padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 120px; text-align:right;">Jatuh Tempo</label>
                      <select class="custom-select" id="pilih_jatuh" name="pilih_jatuh" style="width: 200px;" required>
                        <?php
                              if ($_SESSION['s_pilih_jatuh'] == 'ALL') {
                                    echo "<option value ='ALL' selected>ALL</option>";
                              } else {
                                    echo "<option value ='ALL'>ALL</option>";
                              }

                              $sql1 = $koneksi_master->query("SELECT * from pb_master.tb_trxtype a where a.status='A' and exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.status='A' and a.kode_trxtype=x.kode_trxtype) ORDER BY a.kode_trxtype asc");
                              while ($datacek = $sql1->fetch_assoc()) {

                                if ($_SESSION['s_pilih_jatuh'] == $datacek['kode_trxtype']) {
                                    echo "<option value ='$datacek[kode_trxtype]' selected>$datacek[deskripsi]</option>";
                                } else {
                                    echo "<option value ='$datacek[kode_trxtype]'>$datacek[deskripsi]</option>";
                                }
                              }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4" style="padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 120px">Jangka Waktu</label>
                      <select class="custom-select" id="pilih_jangka" style="width: 200px;" name="pilih_jangka"
                        required>
                        <option value="30" <?php if ($_SESSION['s_pilih_jangka'] == '30') {
                                                                        echo 'selected';
                                                                    } ?>>1 Bulan</option>
                        <option value="90" <?php if ($_SESSION['s_pilih_jangka'] == '90') {
                                                                        echo 'selected';
                                                                    } ?>>3 Bulan</option>
                        <option value="120" <?php if ($_SESSION['s_pilih_jangka'] == '120') {
                                                                        echo 'selected';
                                                                    } ?>>6 Bulan</option>
                        <option value="365" <?php if ($_SESSION['s_pilih_jangka'] == '365') {
                                                                        echo 'selected';
                                                                    } ?>>1 Tahun</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4" style=" padding-bottom: 10px;">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"
                        style="font-weight: bold; width: 120px; text-align:right;">Pengguna</label>
                      <select class="custom-select" id="pilih_pengguna_mobil" name="pilih_pengguna_mobil"
                        style="width: 200px;" required>
                        <?php
                              if ($_SESSION['s_pilih_pengguna_mobil'] == 'ALL') {
                                    echo "<option value ='ALL' selected>ALL</option>";
                              } else {
                                    echo "<option value ='ALL'>ALL</option>";
                              }

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
      
  <?php 
      
  ?>
 <?php  echo $_SESSION['s_pilih_jatuh'];?>

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">DAFTAR REMINDER</h3>
    </div>
    <div class="card-body">
    <?php if ($_SESSION['s_pilih_jatuh'] <> 'ALL') { ?>
      <a href="?page=aktiva&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
 <?php } ?>
 
      <div class="row">
        <?php
                $sqltext = "SELECT distinct a.kode_aktiva, b.deskripsi_aktiva from pb_transaksi.tb_aktiva_detail a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva";

                $sqltext = $sqltext . " WHERE a.status = 'A' and b.status = 'A'";
    
                if ($_SESSION['s_pilih_pengguna_mobil'] <> 'ALL') {
                    $sqltext = $sqltext . " AND '" . $_SESSION['s_pilih_pengguna_mobil'] . "' = a.deskripsi_aktiva ";
                }

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
          <a class="btn btn-outline-primary" style="margin:2px;"
            href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $LinkPrev; ?>">Prev</a>
          <?php
                        }
                        ?>
          <?php

          // Hitung jumlah halaman yang tersedia
          $jumlahPage = ceil($JumlahData / $limit);
          if ($halaman > $jumlahPage + 1) { ?>

              <script>
                window.location.href = "?page=jatuh_tempo&aksi=home_reminder_coba&halaman=1";

              </script> 
          <?php }

              // Jumlah link number 
              $jumlahNumber = 1;

              // Untuk awal link number
              $startNumber = ($halaman > $jumlahNumber) ? $halaman - $jumlahNumber : 1;

              // Untuk akhir link number
              $endNumber = ($halaman < ($jumlahPage - $jumlahNumber)) ? $halaman + $jumlahNumber : $jumlahPage;
              for ($i = $startNumber; $i <= $endNumber; $i++) {
                  $linkActive = ($halaman == $i) ? '"btn btn-primary "' : '"btn btn-outline-primary" ';
          ?>

          <a class=<?php echo $linkActive; ?> style="margin:2px;"
            href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php } ?>

          <!-- link Next Page -->
          <?php
                        if ($halaman == $jumlahPage) { ?>
          <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
          <?php
                        } else {
                            $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                        ?>
          <a class="btn btn-outline-primary" style="margin:2px;"
            href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $linkNext; ?>">Next</a>
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
                 

                  $sql_cari_plat = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000004' and status='A' and kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_cari_plat = $sql_cari_plat->fetch_assoc();


                  $sql_jatuh_tempo_polis = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail  a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000006' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_jatuh_tempo_polis = $sql_jatuh_tempo_polis->fetch_assoc();


                  $sql_jatuh_tempo_kir = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000010' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_jatuh_tempo_kir = $sql_jatuh_tempo_kir->fetch_assoc();

                  $sql_jatuh_tempo_pjk = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000011' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_jatuh_tempo_pjk = $sql_jatuh_tempo_pjk->fetch_assoc();

                  $sql_jatuh_tempo_plat = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000012' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_jatuh_tempo_plat = $sql_jatuh_tempo_plat->fetch_assoc();
                  
                  $sql_periode_akhir = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000014' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_periode_akhir = $sql_periode_akhir->fetch_assoc();
                  
                  $sql_pengguna_mobil = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000005' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  $tampil_pengguna_mobil = $sql_pengguna_mobil->fetch_assoc();

                  $sql_trxtype = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail b inner join pb_master.tb_trxtype a on b.kode_trxtype=a.kode_trxtype where a.status='A' and b.kode_aktiva='".$data['kode_aktiva']."' and exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.status='A' and a.kode_trxtype=x.kode_trxtype) ORDER BY a.kode_trxtype asc");
                  $tampil_trxtype = $sql_trxtype->fetch_assoc();

                  // $sql_foto = $koneksi_master->query("SELECT a.tgl_jatuh_tempo, b.deskripsi_aktiva, a.deskripsi_aktiva 'desk_aktiva', a.file, a.kode_aktiva, a.kode_trxtype, a.tgl_create, a.periode_awal, a.periode_akhir FROM pb_transaksi.tb_aktiva_detail a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva where b.status='A' and a.status='A' and a.kode_trxtype='$kode_trxtype' and a.kode_aktiva='".$data['kode_aktiva']."'");
                  // $tampil_foto = $sql_foto->fetch_assoc();
                  
                ?>

        <div class="card col-sm-6 shadow p-2 mb-4 bg-body"
          style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: 	#F5F5F5;">
          <div class="card-header text-dark text-center"
            style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; background-color: #B0C4DE;">
            <h6>
              <b><?php echo $data['deskripsi_aktiva']; ?>
                (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)<br><?php echo $tampil_pengguna_mobil['deskripsi_aktiva'] ?></b></strong>
            </h6>
          </div>
          <!-- <div class="ribbon-wrapper ribbon-xl">
            <div class="shadow p-2 mb-3 ribbon bg- <?php echo $color ?>">
              <?php echo '<b>' .  $status_permintaan . '</b>'; ?> </div>
          </div> -->

<?php
// Digunakan untuk menghitung sisa waktu dari jatuh tempo
$periode_akhir = $tampil_periode_akhir['periode_akhir'].'-01'; 
$setting = 3000;
$hari_ini=date('Y-m-d');

$jatuh_tempo_polis = $tampil_jatuh_tempo_polis['tgl_jatuh_tempo'];
$tgl_jatuh_tempo_polis = new DateTime($jatuh_tempo_polis);
$hari_ini_polis = new DateTime($hari_ini);
$jarak_tempo_polis = $hari_ini_polis->diff($tgl_jatuh_tempo_polis);
$sisa_jarak_polis = $jarak_tempo_polis->days;
//  echo $sisa_jarak_polis;


$jatuh_tempo_kir = $tampil_jatuh_tempo_kir['tgl_jatuh_tempo'];
$tgl_jatuh_tempo_kir = new DateTime($jatuh_tempo_kir);
$hari_ini_kir = new DateTime($hari_ini);
 $jarak_tempo_kir = $hari_ini_kir->diff($tgl_jatuh_tempo_kir);
 $sisa_jarak_kir = $jarak_tempo_kir->days;
//  echo $sisa_jarak_kir;


$jatuh_tempo_pjk = $tampil_jatuh_tempo_pjk['tgl_jatuh_tempo'];
$tgl_jatuh_tempo_pjk = new DateTime($jatuh_tempo_pjk);
$hari_ini_pjk = new DateTime($hari_ini);
 $jarak_tempo_pjk = $hari_ini_pjk->diff($tgl_jatuh_tempo_pjk);
 $sisa_jarak_pjk = $jarak_tempo_pjk->days;
//  echo $sisa_jarak_pjk;


$jatuh_tempo_plat = $tampil_jatuh_tempo_plat['tgl_jatuh_tempo'];
$tgl_jatuh_tempo_plat = new DateTime($jatuh_tempo_plat);
$hari_ini_plat = new DateTime($hari_ini);
 $jarak_tempo_plat = $hari_ini_plat->diff($tgl_jatuh_tempo_plat);
 $sisa_jarak_plat = $jarak_tempo_plat->days;
//  echo $sisa_jarak_plat;

$periode_akhir = $periode_akhir; 
$tgl_jatuh_tempo_gps = new DateTime($periode_akhir);
$hari_ini_gps = new DateTime($hari_ini);
 $jarak_tempo_gps = $hari_ini_gps->diff($tgl_jatuh_tempo_gps);
 $sisa_jarak_gps = $jarak_tempo_gps->days;
  // echo $sisa_jarak_gps;
  // echo $_SESSION['s_pilih_jatuh'];
?>

          <form class="form-horizontal">
            <div class="form-body">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12" style="text-align:center" ;>
                    <div class="form-group row">
                      <div class="col-md-12">


                        <?php if ($sisa_jarak_polis <= $_SESSION['s_pilih_jangka']) { ?>
                        <?php if ($sisa_jarak_polis<$setting){?>
                        <?php if (($tampil_jatuh_tempo_polis ['kode_trxtype'] == $_SESSION['s_pilih_jatuh']) OR  ($_SESSION['s_pilih_jatuh'] == 'ALL')) { ?>

                        <?php echo ($tampil_jatuh_tempo_polis ['deskripsi']); ?><br>
                        <!-- Jatuh Tempo Polis : <br> -->
                        <b><?php echo strftime("%A, %d %B %Y", strtotime($tampil_jatuh_tempo_polis['tgl_jatuh_tempo'])); ?></b><br>
                        <?php echo 'Tersisa ('.$sisa_jarak_polis.' hari)';?> <br><br>
                        <?php } }
                      }?>

                        <?php if ($sisa_jarak_kir <= $_SESSION['s_pilih_jangka']) { ?>
                        <?php if ($sisa_jarak_kir<$setting){?>
                        <?php if (($tampil_jatuh_tempo_kir ['kode_trxtype'] == $_SESSION['s_pilih_jatuh']) OR  ($_SESSION['s_pilih_jatuh'] == 'ALL')) { ?>

                        <?php echo ($tampil_jatuh_tempo_kir ['deskripsi']); ?><br>

                        <!-- Jatuh Tempo KIR : <br> -->
                        <b><?php echo strftime("%A, %d %B %Y", strtotime($tampil_jatuh_tempo_kir['tgl_jatuh_tempo'])); ?></b><br>
                        <?php echo 'Tersisa ('.$sisa_jarak_kir.' hari)';?> <br><br>
                        <?php }
                        }
                      }?>

                        <?php if ($sisa_jarak_pjk <= $_SESSION['s_pilih_jangka']) { ?>
                        <?php if ($sisa_jarak_pjk<$setting){?>
                        <?php if (($tampil_jatuh_tempo_pjk ['kode_trxtype'] == $_SESSION['s_pilih_jatuh'])OR  ($_SESSION['s_pilih_jatuh'] == 'ALL')) { ?>

                        <?php echo ($tampil_jatuh_tempo_pjk ['deskripsi']); ?><br>

                        <!-- Jatuh Tempo Pajak Tahunan : <br> -->
                        <b><?php echo strftime("%A, %d %B %Y", strtotime($tampil_jatuh_tempo_pjk['tgl_jatuh_tempo'])); ?></b><br>
                        <?php echo 'Tersisa ('.$sisa_jarak_pjk.' hari)';?> <br><br>
                        <?php }
                        }
                      }?>

                        <?php if ($sisa_jarak_plat <= $_SESSION['s_pilih_jangka']) { ?>
                        <?php if ($sisa_jarak_plat<$setting){?>
                        <?php if (($tampil_jatuh_tempo_plat ['kode_trxtype'] == $_SESSION['s_pilih_jatuh']) OR  ($_SESSION['s_pilih_jatuh'] == 'ALL')) { ?>

                        <?php echo ($tampil_jatuh_tempo_plat ['deskripsi']); ?><br>

                        <!-- Jatuh Tempo Plat : <br> -->
                        <b><?php echo strftime("%A, %d %B %Y", strtotime($tampil_jatuh_tempo_plat['tgl_jatuh_tempo'])); ?></b><br>
                        <?php echo 'Tersisa ('.$sisa_jarak_plat.' hari)';?> <br><br>
                        <?php }
                        }
                      }?>

                        <?php if ($sisa_jarak_gps <= $_SESSION['s_pilih_jangka']) { ?>
                        <?php if ($sisa_jarak_gps<$setting){?>
                        <?php if (($tampil_periode_akhir ['kode_trxtype'] == $_SESSION['s_pilih_jatuh']) OR  ($_SESSION['s_pilih_jatuh'] == 'ALL')) { ?>

                        <?php echo ($tampil_periode_akhir ['deskripsi']); ?> AKHIR GPS HBLOW : <br>
                        <b><?php echo strftime("%A, %d %B %Y", strtotime($periode_akhir)); ?></b><br>
                        <?php echo 'Tersisa ('.$sisa_jarak_gps.' hari)';?> <br><br>
                        <?php }
                        }
                      }?>

                      <!-- <?php echo $tampil_trxtype['kode_trxtype']; ?> -->

                        <?php if ($_SESSION['s_pilih_jatuh'] <> 'ALL') { ?>
                        <div class="col-md-12" style="text-align:center">
                          <div class="form-group row">
                          
                            <label class="control-label text-center col-md-12">Aksi </label>
                            <div class="col-md-12">
                              <a href="?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $tampil_trxtype['kode_trxtype']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil_trxtype['kode_trxtype'] . $angka); ?>"
                                class="btn btn-success "><i class="fas fa-eye"></i></a>

                              <a href="?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $tampil_trxtype['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil_trxtype['kode_trxtype'] . $angka); ?>"
                                class="btn btn-warning "><i class="fa fa-bell"></i></a>

                              <a href="?page=jatuh_tempo&aksi=duplicate&kode_trxtype=<?php echo $tampil_trxtype['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil_trxtype['kode_trxtype'] . $angka); ?>"
                                class="btn btn-secondary"><i class="fa fa-clone"></i></a>


                              <!-- Tambahi button untuk download file -->
                            </div>
                          </div>
                        </div>
                        <?php } ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
        <!-- </div> -->
        <?php }
                if ($JumlahData > 0) {
                    echo '<br> Menampilkan ' . $awal . ' sampai ' . $akhir . ' dari total ' . $JumlahData . ' data.';
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
    <a class="btn btn-outline-primary" style="margin:2px;"
      href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $LinkPrev; ?>">Prev</a>
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
    <a class=<?php echo $linkActive; ?> style="margin:2px;"
      href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
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
    <a class="btn btn-outline-primary" style="margin:2px;"
      href="?page=jatuh_tempo&aksi=home_reminder_coba&halaman=<?php echo $linkNext; ?>">Next</a>
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
