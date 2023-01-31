<?php

$str_perusahaan = "select * from hr_transaksi_karir.tb_perusahaan where kode_mitrakerja='$kode_mitrakerja' and status='A' ";
$sql_perusahaan = $koneksi_master->query($str_perusahaan);
$tampil_perusahaan = $sql_perusahaan->fetch_assoc();

$str_departemen = "select kode_departemen from pb_master.tb_departemen where kode_mitrakerja='$kode_mitrakerja' and status='A' ";
$sql_departemen = $koneksi_master->query($str_departemen);
$tampil_departemen = $sql_departemen->fetch_assoc();

$str_subdepartemen = "select * from pb_master.tb_subdepartemen where kode_mitrakerja='$kode_mitrakerja' and kode_departemen in (select kode_departemen from pb_master.tb_departemen where kode_mitrakerja='$kode_mitrakerja' and status='A') and status='A' ";
$sql_subdepartemen = $koneksi_master->query($str_subdepartemen);
$tampil_subdepartemen = $sql_subdepartemen->fetch_assoc();

$str_jabatan = "select kode_jabatan from pb_master.tb_jabatan where kode_mitrakerja='$kode_mitrakerja' and status='A' ";
$sql_jabatan = $koneksi_master->query($str_jabatan);
$tampil_jabatan = $sql_jabatan->fetch_assoc();



$str_pencari_kerja = "select * from hr_transaksi_karir.tb_pencari_kerja where nik='$nik' and status='A' ";
$sql_pencari_kerja = $koneksi_master->query($str_pencari_kerja);
$tampil_pencari_kerja = $sql_pencari_kerja->fetch_assoc();




$str_profile_pendidikan = "select nik from hr_transaksi_karir.tb_profile_pendidikan where nik='$nik' and status='A'  and pend<>'TP051' ";
$sql_profile_pendidikan = $koneksi_master->query($str_profile_pendidikan);
$tampil_profile_pendidikan = $sql_profile_pendidikan->fetch_assoc();

$str_profile_bahasa = "select nik from hr_transaksi_karir.tb_profile_bahasa where nik='$nik' and status='A' ";
$sql_profile_bahasa = $koneksi_master->query($str_profile_bahasa);
$tampil_profile_bahasa = $sql_profile_bahasa->fetch_assoc();

$str_profile_riwayat_pekerjaan = "select nik from hr_transaksi_karir.tb_profile_riwayat_pekerjaan where nik='$nik' and status='A' ";
$sql_profile_riwayat_pekerjaan = $koneksi_master->query($str_profile_riwayat_pekerjaan);
$tampil_profile_riwayat_pekerjaan = $sql_profile_riwayat_pekerjaan->fetch_assoc();

$str_profile_atasan = "select nik from hr_transaksi_karir.tb_profile_atasan where nik='$nik' and status='A' ";
$sql_profile_atasan = $koneksi_master->query($str_profile_atasan);
$tampil_profile_atasan = $sql_profile_atasan->fetch_assoc();

$str_profile_organisasi = "select nik from hr_transaksi_karir.tb_profile_organisasi where nik='$nik' and status='A' ";
$sql_profile_organisasi = $koneksi_master->query($str_profile_organisasi);
$tampil_profile_organisasi = $sql_profile_organisasi->fetch_assoc();

$str_profile_pendukung = "select count(nik) 'jumlah' from hr_transaksi_karir.tb_profile_pendukung where nik='$nik' and status='A' ";
$sql_profile_pendukung = $koneksi_master->query($str_profile_pendukung);
$tampil_profile_pendukung = $sql_profile_pendukung->fetch_assoc();

$str_profile_penyakit = "select nik from hr_transaksi_karir.tb_profile_penyakit where nik='$nik' and status='A' ";
$sql_profile_penyakit = $koneksi_master->query($str_profile_penyakit);
$tampil_profile_penyakit = $sql_profile_penyakit->fetch_assoc();

$str_profile_psikolog = "select nik from hr_transaksi_karir.tb_profile_psikolog  where nik='$nik' and status='A' ";
$sql_profile_psikolog = $koneksi_master->query($str_profile_psikolog);
$tampil_profile_psikolog = $sql_profile_psikolog->fetch_assoc();

$str_profile_pertanyaan = "select status_perkawinan, nik,soal1, soal11, soal18,soal19 from hr_transaksi_karir.tb_profile_pertanyaan  where nik='$nik' and status='A' ";
$sql_profile_pertanyaan = $koneksi_master->query($str_profile_pertanyaan);
$tampil_profile_pertanyaan = $sql_profile_pertanyaan->fetch_assoc();

$str_profile_pendidikan_nonformal = "select nik from hr_transaksi_karir.tb_profile_pendidikan where nik='$nik' and status='A'  and pend='TP051' ";
$sql_profile_pendidikan_nonformal = $koneksi_master->query($str_profile_pendidikan_nonformal);
$tampil_profile_pendidikan_nonformal = $sql_profile_pendidikan_nonformal->fetch_assoc();

$str_perusahaan_detail = "select count(kode_mitrakerja) 'jumlah' from hr_transaksi_karir.tb_perusahaan_detail where kode_mitrakerja='$kode_mitrakerja' and status='A' and kode_trxtype in('TP074','TP075','TP076') ";
$sql_perusahaan_detail = $koneksi_master->query($str_perusahaan_detail);
$tampil_perusahaan_detail = $sql_perusahaan_detail->fetch_assoc();


$str_benefit = "select kode_benefit from pb_master.tb_benefit where kode_mitrakerja='$kode_mitrakerja' and status='A'";
$sql_benefit = $koneksi_master->query($str_benefit);
$tampil_benefit = $sql_benefit->fetch_assoc();


$str_tugas_tanggung_jawab = "select kode_tugas_tanggung_jawab from pb_master.tb_tugas_tanggung_jawab where kode_mitrakerja='$kode_mitrakerja' and status='A'";
$sql_tugas_tanggung_jawab = $koneksi_master->query($str_tugas_tanggung_jawab);
$tampil_tugas_tanggung_jawab = $sql_tugas_tanggung_jawab->fetch_assoc();


$str_kriteria = "select kode_kriteria_nonset from pb_master.tb_kriteria where kode_mitrakerja='$kode_mitrakerja' and status='A'";
$sql_kriteria = $koneksi_master->query($str_kriteria);
$tampil_kriteria = $sql_kriteria->fetch_assoc();

$str_golongan = "select kode_golongan from pb_master.tb_golongan where kode_mitrakerja='$kode_mitrakerja' and status='A' ";
$sql_golongan = $koneksi_master->query($str_golongan);
$tampil_golongan = $sql_golongan->fetch_assoc();


$str_perusahaan = "select * from hr_transaksi_karir.tb_perusahaan where kode_mitrakerja='$kode_mitrakerja' and status='A' ";
$sql_perusahaan = $koneksi_master->query($str_perusahaan);
$tampil_perusahaan = $sql_perusahaan->fetch_assoc();


$str_lowongan_kerja = "select * from hr_transaksi_karir.tb_loker where status='A' ";
$sql_lowongan_kerja = $koneksi_master->query($str_lowongan_kerja);
$tampil_lowongan_kerja = $sql_lowongan_kerja->fetch_assoc();




// pemberkasan
$str_kartu = "select count(jenis_kartu) 'jumlah' from
(select jenis_kartu from hr_transaksi_karir.tb_profile_kartu where nik='$nik' and status='A' and jenis_kartu in(select kode_trxtype from pb_master.tb_view_detail where kode_view='KV001') GROUP by jenis_kartu) x
";

// select count(nik) 'jumlah' from hr_transaksi_karir.tb_profile_kartu where nik='$nik' and status='A' and jenis_kartu in(select kode_trxtype from pb_master.tb_view_detail where kode_view='KV001')


$sql_kartu = $koneksi_master->query($str_kartu);
$tampil_kartu = $sql_kartu->fetch_assoc();

$str_jumlah_kartu = "select count(kode_trxtype) 'jumlah' from pb_master.tb_view_detail where kode_view='KV001' AND status='A' ";
$sql_jumlah_kartu = $koneksi_master->query($str_jumlah_kartu);
$tampil_jumlah_kartu = $sql_jumlah_kartu->fetch_assoc();

$str_keluarga_ayah = "select count(nik) 'jumlah' from hr_transaksi_karir.tb_profile_keluarga where nik='$nik' and status='A' and uraian in (select kode_trxtype from pb_master.tb_view_detail where kode_view='KV002') ";
$sql_keluarga_ayah = $koneksi_master->query($str_keluarga_ayah);
$tampil_keluarga_ayah = $sql_keluarga_ayah->fetch_assoc();

$str_jumlah_keluarga_ayah = "select count(kode_trxtype) 'jumlah' from pb_master.tb_view_detail where kode_view='KV002' ";
$sql_jumlah_keluarga_ayah = $koneksi_master->query($str_jumlah_keluarga_ayah);
$tampil_jumlah_keluarga_ayah = $sql_jumlah_keluarga_ayah->fetch_assoc();


$str_keluarga_suami_istri = "select count(nik) 'jumlah' from hr_transaksi_karir.tb_profile_keluarga where nik='$nik' and status='A' and uraian in (select kode_trxtype from pb_master.tb_view_detail where kode_view='KV003') ";
$sql_keluarga_suami_istri = $koneksi_master->query($str_keluarga_suami_istri);
$tampil_keluarga_suami_istri = $sql_keluarga_suami_istri->fetch_assoc();

$str_jumlah_keluarga_suami_istri = "select count(kode_trxtype) 'jumlah' from pb_master.tb_view_detail where kode_view='KV003' ";
$sql_jumlah_keluarga_suami_istri = $koneksi_master->query($str_jumlah_keluarga_suami_istri);
$tampil_jumlah_keluarga_suami_istri = $sql_jumlah_keluarga_suami_istri->fetch_assoc();







$oke = 0;

if (($tampil_kartu['jumlah'] >= $tampil_jumlah_kartu['jumlah']) and
  ($tampil_keluarga_ayah['jumlah'] >= $tampil_jumlah_keluarga_ayah['jumlah']) and
  ($tampil_profile_pendukung['jumlah'] >= 3)

) {

  $oke = 1;
  if (($tampil_profile_pertanyaan['status_perkawinan'] == '3' and $tampil_keluarga_suami_istri['jumlah'] < $tampil_jumlah_keluarga_suami_istri['jumlah']) or ($tampil_profile_pertanyaan['soal1'] == 'Y' and $tampil_profile_riwayat_pekerjaan['nik'] == null) or ($tampil_profile_pertanyaan['soal1'] == 'Y' and $tampil_profile_atasan['nik'] == null)

  ) {
    $oke = 0;
  }
}
?>




<?php if ($level == 'PENCARI KERJA') { ?>
  <h5 align="center"><b>SELAMAT DATANG <?php echo $nama; ?> DI WEBSITE SNI KARIR</b></h5>
  <H6 align="center">DIMOHON UNTUK MENGISIKAN SEMUA DATA YANG TERSEDIA</H6><br>
<?php } else { ?>

  <h5 align="center"><b>SELAMAT DATANG <?php echo $nama; ?> DI WEBSITE SNI KARIR</b></h5>
  <H6 align="center">ANDA SEBAGAI ADMIN <?php echo $tampil_perusahaan['nama']; ?></H6><br>
<?php } ?>

<?php if ($level == 'PENCARI KERJA' and $type == 'PENCARI KERJA') { ?>
  <div class="row">


    <div class="col-12 col-sm-12">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-bullhorn"></i> &nbsp Progress</h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>

          </div>
        </div>
        <!-- /.card-header -->

        <div class="direct-chat-messages">
          <div class="card-body">
            <section class="content">
              <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">

                      <?php
                      $no = 1;

                      // $str_progress_pelamar ="
                      // ";
                      // $sql_progress_pelamar = $koneksi_master->query($str_progress_pelamar);
                      // $tampil_progress_pelamar = $sql_progress_pelamar->fetch_assoc();

                      $sql_progress_pelamar = $koneksi_master->query("select c.deskripsi, a.deskripsi 'deskripsi_progress', a.tgl_create, a.kode_progress from hr_transaksi_karir.tb_detail_progress_pelamar a join 
                     pb_master.tb_progress_pelamar b on a.kode_progress=b.kode_progress join 
                     pb_master.tb_trxtype c on b.kode_trxtype=c.kode_trxtype where a.status='A' and nik='$nik' order by tgl_create  desc ");
                      while ($data_progress_pelamar = $sql_progress_pelamar->fetch_assoc()) {
                        $color = '#007bff';
                        $bgcolor = 'bg-primary';
                        $icon = 'fas fa-file-alt';
                        if (substr($data_progress_pelamar['deskripsi'], 0, 13) == 'PENJADWALAN (') {
                          $color = '#007bff';
                          $bgcolor = 'bg-primary';
                          $icon = 'fas fa-calendar-alt';
                        } elseif (substr($data_progress_pelamar['deskripsi'], 0, 12) == 'MENGHADIRI (') {
                          $color = '#28a745';
                          $bgcolor = 'bg-success';
                          $icon = 'fas fa-check';
                        } elseif (substr($data_progress_pelamar['deskripsi'], 0, 9) == 'SELESAI -'  or substr($data_progress_pelamar['deskripsi'], 0, 18) == 'TIDAK MENGHADIRI (' or substr($data_progress_pelamar['deskripsi'], 0, 7) == 'GAGAL (' or $data_progress_pelamar['deskripsi'] == 'BATAL') {
                          $color = '#dc3545';
                          $bgcolor = 'bg-red';
                          $icon = 'fas fa-times';
                        } elseif ($data_progress_pelamar['deskripsi'] == 'DITERIMA') {
                          $color = '#007bff';
                          $bgcolor = 'bg-primary';
                          $icon = 'fas fa-calendar-check';
                        }
                      ?>

                        <div>
                          <i class=" <?php echo $icon . ' ' . $bgcolor; ?>"></i>
                          <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#" style="color:<?php echo $color; ?>"><?php echo $data_progress_pelamar['deskripsi'] ?></a>
                              <div style="text-align:right;padding-right: 5px; font-size:9pt">
                                <span class="time"><i class="fas fa-clock"></i>
                                  <?php
                                  setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
                                  date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
                                  echo strftime("%A, %d %B %Y", strtotime($data_progress_pelamar['tgl_create'])) . '<span style=color:#a10000>' . date(' H:i:s', strtotime($data_progress_pelamar['tgl_create'])) . "</b></span> \n";
                                  ?>

                                </span>
                              </div>
                            </h3>

                            <div class="timeline-body" style="text-align: justify; font-size:10pt;">
                              <?php echo htmlspecialchars_decode($data_progress_pelamar['deskripsi_progress']) ?>
                            </div>

                          </div>
                        </div>

                      <?php } ?>

                    </div>
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.timeline -->

            </section>
          </div>

        </div>

      </div>








    </div>


    <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="lowongankerja-tab" data-toggle="pill" href="#lowongankerja" role="tab" aria-controls="lowongankerja" aria-selected="true">Lowongan Kerja</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" id="informasi-tab" data-toggle="pill" href="#informasi" role="tab" aria-controls="informasi" aria-selected="false">Informasi</a>
            </li>

          </ul>
        </div>
        <div class="cardbody">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade  show active" id="lowongankerja" role="tabpanel" aria-labelledby="lowongankerja-tab">

              <?php include "dashboard_loker.php";
              ?>
            </div>
            <div class="tab-pane fade" id="informasi" role="tabpanel" aria-labelledby="informasi-tab">
              <?php
              include "dashboard_info.php";
              ?>

            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>





  </div>
<?php } ?>


<?php if ($level == 'ADMIN' and $type == 'ADMIN') { ?>

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="table-responsive" style="padding-left:20px;padding-right:20px;padding-bottom:20px;padding-top:20px;">
          <div class="row">

            <div class="col-md-3" style="padding-bottom: 10px;">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px">Dashboard</label>

                <select class="custom-select" id="dashboard" style="width: 200px;" name="dashboard" required>

                  <option value="1" <?php if ($_SESSION['s_dashboard'] == '1') {
                                      echo 'selected';
                                    } ?>>LOKER</option>

                  <option value="2" <?php if ($_SESSION['s_dashboard'] == '2') {
                                      echo 'selected';
                                    } ?>>PENJADWALAN</option>

                  <option value="3" <?php if ($_SESSION['s_dashboard'] == '3') {
                                      echo 'selected';
                                    } ?>>DATA MASTER</option>

                  <option value="4" <?php if ($_SESSION['s_dashboard'] == '4') {
                                      echo 'selected';
                                    } ?>>LAPORAN</option>
                </select>
              </div>
            </div>

            <?php
            if ($_SESSION['s_dashboard'] == '2' or $_SESSION['s_dashboard'] == '1' or $_SESSION['s_dashboard'] == '4') {
            ?>

              <div class="col-md-3" style="padding-bottom: 10px;">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px">Bulan</label>

                  <?php

                  $check_tgl = $_SESSION['s_pilih_tanggal'];

                  ?>

                  <input type="month" id="pilih_tanggal" style="width: 200px;" name="pilih_tanggal" value="<?php echo $_SESSION['s_pilih_tanggal']; ?>" required>

                </div>
              </div>

            <?php
            } ?>




            <?php
            if ($_SESSION['s_dashboard'] == '1') {
            ?>

              <div class="col-md-3" style=" padding-bottom: 10px;">
                <div class="input-group-prepend">

                  <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px; text-align:right;">Jenis</label>

                  <select class="custom-select" id="status_loker" style="width: 200px;" name="status_loker" required>

                    <option value="A" <?php if ($_SESSION['s_status_loker'] == 'A') {
                                        echo 'selected';
                                      } ?>>AKTIF</option>

                    <option value="N" <?php if ($_SESSION['s_status_loker'] == 'N') {
                                        echo 'selected';
                                      } ?>>TIDAK AKTIF</option>

                    <option value="Y" <?php if ($_SESSION['s_status_loker'] == 'Y') {
                                        echo 'selected';
                                      } ?>>BERAKHIR</option>
                  </select>
                </div>
              </div>

            <?php
            } ?>

            <?php
            if ($_SESSION['s_dashboard'] == '2') {
            ?>

              <div class="col-md-3" style=" padding-bottom: 10px;">
                <div class="input-group-prepend">

                  <label class="input-group-text" for="inputGroupSelect01" style="font-weight: bold; width: 90px; text-align:right;">Jenis</label>

                  <select class="custom-select" id="penjadwalan" name="penjadwalan" style="width: 200px;" required>

                    <?php

                    $sql1 = $koneksi_master->query("SELECT * from pb_master.tb_progress_pelamar a join pb_master.tb_trxtype c on a.kode_trxtype=c.kode_trxtype where a.status='A' and exists(select b.kode_trxtype from pb_master.tb_view_detail b where b.kode_view='KV004' and  b.status='A' and a.kode_trxtype=b.kode_trxtype) order by kode_progress");
                    while ($datacek = $sql1->fetch_assoc()) {

                      if ($_SESSION['s_penjadwalan'] == $datacek['kode_progress']) {

                        echo "<option value ='$datacek[kode_progress]' selected>$datacek[deskripsi]</option>";
                      } else {
                        echo "<option value ='$datacek[kode_progress]'>$datacek[deskripsi]</option>";
                      }
                    }

                    ?>

                  </select>
                </div>
              </div>

            <?php
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">

        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">

            <div class="tab-pane fade  show active" id="adminloker" role="tabpanel" aria-labelledby="adminloker-tab">
              <!-- <?php echo $_SESSION['s_status_loker']; ?> -->
              <?php
              if ($_SESSION['s_dashboard'] == '1') {
              ?>
                <?php include "dashboard_admin_loker.php";
                ?>

              <?php
              } else if ($_SESSION['s_dashboard'] == '2') {
              ?>

                <?php include "page/penjadwalan/penjadwalan.php";
                ?>
                <?php include "page/hasiltes/hasiltes.php";
                ?>

              <?php
              } else if ($_SESSION['s_dashboard'] == '3') {
              ?>

                <?php include "dashboard_admin_data.php";
                ?>

              <?php } else if ($_SESSION['s_dashboard'] == '4') {
              ?>

                <?php include "dashboard_admin_laporan.php";
                ?>

              <?php } ?>



            </div>

          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
<?php } ?>



<?php if ($level == 'ADMIN' and $type == 'MITRA KERJA') { ?>
  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" id="admindata-tab" data-toggle="pill" href="#admindata" role="tab" aria-controls="admindata" aria-selected="true">Dashboard Data</a>
            </li>





          </ul>
        </div>
        <div class="card<ody">
          <div class="tab-content" id="custom-tabs-one-tabContent">

            <div class="tab-pane fade  show active" id="admindata" role="tabpanel" aria-labelledby="admindata-tab">
              <?php include "dashboard_admin_data.php";
              ?>
            </div>



          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

  </div>
<?php } ?>


<!-- penjadwalan -->

$("#penjadwalan").change(function(){
        // variabel dari nilai combo box Subdepartement
        var penjadwalan = $("#penjadwalan").val();
       
        // tampilkan image load
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "dist/ajax/pilih_penjadwalan.php",
            data: "penjadwalan="+penjadwalan,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                   // $("#divkode_perijinan").html(msg);                                                     
                //    location.reload();
                window.location.href = "?page=home&halaman=1";
                    
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });

<!-- ajax -->
<?php
    session_start();
    $_SESSION['s_penjadwalan']=$_POST['penjadwalan'];

    echo "PR00002";
?>
