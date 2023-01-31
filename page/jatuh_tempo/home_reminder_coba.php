<?php 
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
    date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

    $menu = '';
    $limit = $_SESSION['s_limit'];
    $halaman = (isset($_GET['halaman'])) ? (int) $_GET['halaman'] : 1;
    $limitStart = ($halaman - 1) * $limit;

    
?>


<?php 
$sql = $koneksi_master->query("SELECT kode_trxtype, deskripsi FROM pb_master.tb_trxtype where kode_trxtype='".$_SESSION['s_pilih_jatuh']."'");
$tampil = $sql->fetch_assoc();


?>
<!-- BODY -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">DAFTAR PENGINGAT PERIZINAN <?php echo $_SESSION['s_pilih_pengguna_mobil']?> </h3>
      </div>
      <div class="card-body">
        <?php if ( ($_SESSION['s_pilih_jatuh'] <> 'ALL') and ($_SESSION['s_pilih_jatuh'] <> '')) { ?>
        
        <a href="?page=aktiva&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data Unit  </a>
        
        <a href="?page=jatuh_tempo&aksi=tambah&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh']. $angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah <?php echo $tampil['deskripsi']; ?>  </a>

        <a href="?page=jatuh_tempo&aksi=p_tambah&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh']. $angka); ?>" class="btn btn-warning" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Pengingat <?php echo $tampil['deskripsi']; ?></a>
        <?php } ?>

        <div class="row">
          <?php 
          // SELECT a.kode_aktiva, a.kode_trxtype, b.deskripsi_aktiva, a.start, a.end, a.periode, a.deskripsi, a.time, c.deskripsi 'desk_trx', d.tgl_jatuh_tempo from pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva inner join pb_master.tb_trxtype c on a.kode_trxtype=c.kode_trxtype inner join pb_transaksi.tb_aktiva_detail d on a.kode_aktiva = d.kode_aktiva inner join pb_master.tb_mapping_reminder e on d.kode_trxtype=e.kode_trxtype where a.kode_aktiva = 'A000001' and e.kode_trxtype = 'TRX000006'

                    $sqltext = "SELECT a.kode_aktiva, a.kode_pengingat, a.status_reminder, a.kode_trxtype, b.deskripsi_aktiva, d.file, a.start, a.end, a.periode, a.deskripsi, a.time, c.deskripsi 'desk_trx', d.tgl_jatuh_tempo, d.periode_akhir, a.flag_periode from pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva inner join pb_master.tb_trxtype c on a.kode_trxtype=c.kode_trxtype inner join pb_transaksi.tb_aktiva_detail d on a.kode_aktiva = d.kode_aktiva inner join pb_master.tb_mapping_reminder e on d.kode_trxtype=e.kode_trxtype ";

                    $sqltext = $sqltext . " WHERE a.status = 'A' and b.status='A' ";

                   
                    if ( ($_SESSION['s_pilih_jatuh'] <> 'ALL') and ($_SESSION['s_pilih_jatuh'] <> '')) {
                      $sqltext = $sqltext . " AND '" . $_SESSION['s_pilih_jatuh'] . "' = e.kode_trxtype ";
                   }
                  //   if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {
                  //     $sqltext = $sqltext . " ORDER BY d.periode_akhir ASC ";
                  //  }
                   $sqltext = $sqltext . " ORDER BY tgl_jatuh_tempo ASC";
                   $sqlpaging = $sqltext;
                   $sqltext = $sqltext . " LIMIT " . $limitStart . "," . $limit;
 
                   $sql = $koneksi_master->query($sqltext);
                   $no = $limitStart + 1;
                   // $color_bg = '#FFFFFF';
 
                   $SqlQuery = mysqli_query($koneksi_master, $sqlpaging);
 
                   //Hitung semua jumlah data yang berada pada tabel 
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
                     <?php } else {
                         $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
                     ?>
                     <!-- link Previous Page -->
                         <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
                     <?php } ?>
 
                     <?php
 
                         // Hitung jumlah halaman yang tersedia
                         $jumlahPage = ceil($JumlahData / $limit);
                         if ($halaman > $jumlahPage + 1) { ?>
 
                     <script>
                       window.location.href = "?page=home&halaman=1";
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
 
                     <a class=<?php echo $linkActive; ?> style="margin:2px;" href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                     <?php } ?>
 
                     <!-- link Next Page -->
                     <?php if ($halaman == $jumlahPage) { ?>
                             <a class="btn btn-outline-primary" style="margin:2px;" disabled href="#">Next</a>
                     <?php } else {
                                 $linkNext = ($halaman < $jumlahPage) ? $halaman + 1 : $jumlahPage;
                     ?>
                         <a class="btn btn-outline-primary" style="margin:2px;" href="?page=home&halaman=<?php echo $linkNext; ?>">Next</a>
                    
                     <?php }
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

              $sql_pengguna_mobil = $koneksi_master->query("SELECT * from pb_transaksi.tb_aktiva_detail a inner join pb_master.tb_trxtype b on a.kode_trxtype=b.kode_trxtype where a.kode_trxtype='TRX000005' and a.status='A' and b.status='A' and a.kode_aktiva='".$data['kode_aktiva']."'");
              $tampil_pengguna_mobil = $sql_pengguna_mobil->fetch_assoc();

          ?>

                <?php
                $setting = 3000;
                $hari_ini=date('Y-m-d');

                $jatuh_tempo = $data['tgl_jatuh_tempo'];
                $tgl_jatuh_tempo = new DateTime($jatuh_tempo);
                $hari_ini = new DateTime($hari_ini);
                $jarak_tempo = $hari_ini->diff($tgl_jatuh_tempo);
                $sisa_jarak = $jarak_tempo ->days;
                $sisa_jarak = $jarak_tempo -> days;

                ?>

                <!-- Untuk menghitung sisa hari periode akhir yang tidak ada tanggalnya -->
                <?php
                $periode_akhir = $data['periode_akhir'].'-01'; 
                $hari_ini=date('Y-m-d');
                $periode_akhir = $periode_akhir;
                $tgl_periode_akhir = new DateTime($periode_akhir);
                $hari_ini = new DateTime($hari_ini);
                $jarak_periode_akhir = $hari_ini->diff($tgl_periode_akhir);
                $sisa_jarak_p = $jarak_periode_akhir ->days;
                ?>

          <?php if ($data ['status_reminder'] == $_SESSION['s_pilih_pengingat']) { ?>
            <?php if (($tampil_pengguna_mobil['deskripsi_aktiva'] == $_SESSION['s_pilih_pengguna_mobil']) OR ($_SESSION['s_pilih_pengguna_mobil']== 'ALL')) { ?>
              <?php if ($data ['kode_trxtype'] == $_SESSION['s_pilih_jatuh']) { ?>

          <!-- CARD untuk isi pengingat -->
          <div class="card col-sm-12 shadow p-2 mb-4 bg-body" style="padding: 4px; background-color:bg-white; border-style: solid; border-width: thin; border-top-left-radius: 50px; border-bottom-right-radius: 50px; background-color: 	#F5F5F5;">
          <!-- HEADER CARD -->
          <div class="card-header text-dark text-center" style="border-width: thin; border-top-left-radius: 40px; border-bottom-right-radius: 20px; 
          border-inline: 1rem solid; writing-mode: horizontal-tb; direction: rtl; 
          background-color: #B0C4DE;">
          <h6>
            <b><?php echo $data['deskripsi_aktiva']; ?>
               (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)<br><?php echo $tampil_pengguna_mobil['deskripsi_aktiva'] ?>
            </b>
          </h6>
        
        </div>
        
          <form class="form-horizontal">
            <div class="form-body">
              <div class="card-body">
                <div class="row">

                <!-- Warna TEXT -->
                <?php 
                if ($sisa_jarak <= $_SESSION['s_pilih_jangka'])   {
                  $warna1 = 'text-primary';
                } else {
                  $warna1 = 'text-dark';
                }
                ?>
                <?php 
                if ($sisa_jarak_p <= $_SESSION['s_pilih_jangka']) {
                  $warna = 'text-primary';
                
                } else {
                  $warna = 'text-dark';
                }
                ?>
                <!--  -->

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="control-label text-left col-md-3">Dokumen</label>
                      <div class="col-md-7">
                      <?php if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {?>
                         <strong><span class= <?php echo $warna; ?>><?php echo ($data ['desk_trx']); ?></span></strong><br>
                        <?php } else  { ?>
                          <strong><span class= <?php echo $warna1; ?>><?php echo ($data ['desk_trx']); ?></span></strong><br>

                        <?php } ?>

                          <span class="badge rounded-pill bg-secondary text-dark">
                            <?php if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {?>
                              <?php echo strftime("%d %B %Y", strtotime($data['periode_akhir']));  ?> <br>
                            <?PHP } else { ?>
                              <?php echo strftime("%d %B %Y", strtotime($data['tgl_jatuh_tempo']));  ?> <br>
                            <?PHP } ?>
                          </span>
                          
                          <?php if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {?>
                            <?php if ($tgl_periode_akhir <= $hari_ini) { ?>
                                  <span class="badge rounded-pill bg-danger text-dark">
                                    <?php echo 'Terlambat (-'.$sisa_jarak_p.' hari)';?>
                                  </span>
                              <?php } else  { ?>
                                  <span class="badge rounded-pill bg-warning text-dark">
                                      <?php echo 'Tersisa ('.$sisa_jarak_p.' hari)';?>
                                  </span>
                              <?PHP } ?>
                          <?PHP } else { ?>
                              <?php if ($tgl_jatuh_tempo <= $hari_ini) { ?>
                                  <span class="badge rounded-pill bg-danger text-dark">
                                    <?php echo 'Terlambat (-'.$sisa_jarak.' hari)';?>
                                  </span>
                              <?php } else  { ?>
                                  <span class="badge rounded-pill bg-warning text-dark">
                                      <?php echo 'Tersisa ('.$sisa_jarak.' hari)';?>
                                  </span>
                              <?PHP } ?>
                          <?PHP } ?>
                          
<br>


                              <!-- UNTUK MENAMPILKAN FOTO DAN DOWNLOAD -->
                              <?php if ($data['file'] == (strtoupper(substr($data['file'], -3)) <> 'JPG' and strtoupper(substr($data['file'], -4)) <> 'JPEG' and strtoupper(substr($data['file'], -3)) <> 'PNG')) { ?>
                                    <a href="download.php?filename=<?= $data['file'] ?>">Download</a>
                                  <?php } elseif ($data['file'] == '') { ?>
                                    <?php echo "-";?>
                                      <?php } else { ?>
                                      <!-- <span class="badge rounded-pill bg-dark text-dark"> -->
                                        <a data-toggle="modal"
                                          data-target=<?php echo "#exampleModalPersetujuan" . $data ['tgl_create']; ?> > Lihat Foto</a>
                                          <!-- </span> -->
                                          <!-- <span class="badge bg-info text-dark"> -->
                                        <a href="download.php?filename=<?= $data ['file'] ?>"> Download
                                        <!-- <i class="fa fa-download" aria-hidden="true"></i> -->
                                        </a>
                                        
                                        <!-- </span> -->

                                      <div class="modal fade"
                                        id=<?php echo "exampleModalPersetujuan" . $data ['tgl_create']; ?>
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="exampleModalLabel1">FOTO<?php echo $file; ?></h4>
                                              <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                              <form>
                                                <div>
                                                  <img src="dist/img_web/<?php echo $data ['file']; ?>" width="100%"
                                                    height="100%"></a>

                                                  <a href="download.php?filename=<?= $data ['file'] ?>">Download</a>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  <?php } ?>
                                 
                                  <!-- FOTO DAN DOWNLOAD -->
<br>
                      </div>
                    </div>
                  </div> <!-- Punya dokumen -->
                  
                  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="control-label text-left col-md-3">Pengingat</label>
                      <div class="col-md-9">
                      <?php if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {?>
                        <span class= <?php echo $warna; ?>>
                        <?php echo strftime("%A, %d %B %Y", strtotime($data['start'])); ?> 

                          <?php if ($data['start']<>$data['end']){?> <b>s/d </b>
                             <?php echo strftime("%d %B %Y", strtotime($data['end']));  ?>  <br>
                         <?php }?>
                        <?php if (($data['flag_periode'] <> '')  And ($data['periode'] <> '')) {?>
                           <b><?php echo $data['flag_periode']; ?> ( <?php echo strftime("%d %B %Y", strtotime($data['periode']));  ?> )</b> 
                          
                        <?php } ?>
                       
                        <br><strong><?php echo ($data ['deskripsi']); ?></strong><br>
                          </span>
                        <?php } else  { ?>
                          <span class= <?php echo $warna1; ?>>
                        <?php echo strftime("%A, %d %B %Y", strtotime($data['start'])); ?> 

                          <?php if ($data['start']<>$data['end']){?> <b>s/d </b> 
                             <?php echo strftime("%A, %d %B %Y", strtotime($data['end']));  ?>  <br>
                         <?php }?>
                        <?php if (($data['flag_periode'] <> '')  And ($data['periode'] <> '')) {?>
                           <b><?php echo $data['flag_periode']; ?> ( <?php echo strftime("%d %B %Y", strtotime($data['periode']));  ?> )</b> 
                          
                        <?php } ?>
                       
                        <br><strong><?php echo ($data ['deskripsi']); ?></strong><br>
                          </span>

                        <?php } ?>
                        


                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="control-label text-left col-md-3">Aksi</label>
                      <div class="col-md-6">

                          <!-- <a href="?page=jatuh_tempo&aksi=tambah_dashboard&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh'] . $angka); ?>" class="btn btn-primary "  title="Tambah Jatuh Tempo"><i class="fa fa-plus-circle "></i></a> -->

                          <a href="?page=jatuh_tempo&aksi=detail_dashboard&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh'] . $angka); ?>" class="btn btn-success " title="Detail"><i class="fas fa-eye"></i></a>

                          <a href="?page=jatuh_tempo&aksi=p_tambah_dashboard&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh'] . $angka); ?>" class="btn btn-primary" title="Tambah Pengingat"><i class="fa fa-plus-circle"></i></a>  

                          <a href="?page=jatuh_tempo&aksi=p_detail_dashboard&kode_trxtype=<?php echo $_SESSION['s_pilih_jatuh']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($_SESSION['s_pilih_jatuh'] . $angka); ?>"class="btn btn-warning" title="Pengingat"><i class="fa fa-bell"></i></a>


                          <?php if ($data['status_reminder'] == 'AKTIF') { ?>
                       
                       <a href="?page=jatuh_tempo&aksi=p_on&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                           class="btn btn-danger btn-md" title="ON"><i class="fa fa-power-off"></i></a>
                         <?php } else  { ?>
                      <a href="?page=jatuh_tempo&aksi=p_off&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                           class="btn btn-dark btn-md" title="OFF"><i class="fa fa-power-off"></i></a>

                      <a href="?page=jatuh_tempo&aksi=perpanjang_proses&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                           class="btn btn-info btn-md" title="Perpanjang?"><i class="fa fa-repeat"></i></a>
                      <?php   } ?>
                                         
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="control-label text-left col-md-3">Waktu</label>
                      <div class="col-md-6">
                        <?php if ($_SESSION['s_pilih_jatuh'] == 'TRX000014') {?>
                         <span class= <?php echo $warna; ?>><?php echo ($data ['time']); ?></span><br>
                        <?php } else  { ?>
                          <span class= <?php echo $warna1; ?>><?php echo ($data ['time']); ?></span><br>

                        <?php } ?>

                      </div>
                    </div>
                  </div>

                </div>  <!-- row -->
              </div> <!-- card body 2 -->

            </div>

          </form>

        </div>
        <?php } ?> <!-- punya filter jatuh tempo -->  
        <?php } ?> <!-- punya filter pengguna mobil -->
        <?php } ?> <!-- punya filter on off -->


        
        <?php } ?> <!-- punya while -->
        <?php 
          if ($JumlahData > 0) {
            echo '<br> Menampilkan ' . $awal . ' sampai ' . $akhir . ' dari total ' . $JumlahData . ' data.';
          }
        ?>

        <?php
    if ($JumlahData > 0) { ?>
        <div class="col-sm-12" style="text-align:center">

          <?php

            // Jika page = 1, maka LinkPrev disable
              if ($halaman == 1) {
          ?>

            <!-- link Previous halaman disable -->
            <a class="btn btn-outline-primary" style="margin:2px;" href="#" disabled>Prev</a>
         
          <?php } else {
                  $LinkPrev = ($halaman > 1) ? $halaman - 1 : 1;
          ?>
            <!-- link Prev Page -->
            <a class="btn btn-outline-primary" style="margin:2px;"
              href="?page=home&halaman=<?php echo $LinkPrev; ?>">Prev</a>
          <?php } ?>

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
              href="?page=home&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } ?>

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
            <?php } ?>
            
          </div>
        <?php } ?>

      </div>
      <!-- card-body  -->


    </div>
    <!-- card primary -->
  </div>
  <!-- container -->
</section>
<!-- content -->
