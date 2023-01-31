<?php

$kode_trxtype         = $_GET['kode_trxtype'];

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

<?php
$angka = date('Ymdhis');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
?>
<section on class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><?php echo 'DOKUMEN EMAIL ' ?><?php echo $tampil['deskripsi'] ?></h4>
          </div>
          <div class="card-body">
            <a href="?page=jatuh_tempo" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan All</a>
                <!--  -->
            <a href="?page=jatuh_tempo&aksi=pe_tambah&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>"
              class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                <!--  -->
                    
            <div class="table-responsive">
              <table id="zero_config">
                <table class="table table-striped table-bordered datatable-select-inputs">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Email</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        $sql3 = $koneksi_master->query("SELECT a.kode_email, b.kode_email, a.kode_trxtype, a.tgl_create, b.email FROM pb_transaksi.tb_pengingat_email a INNER JOIN pb_master.tb_email b on a.kode_email=b.kode_email where a.status='A' and a.kode_trxtype='$kode_trxtype'");
                        while ($data1 = $sql3->fetch_assoc()) {
                     ?>
                      <tr>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $no++; ?></td>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data1['email']; ?>
                        </td>
                        <td style="text-align:center; vertical-align:middle;">
                          <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')"
                            href="?page=jatuh_tempo&aksi=pe_hapus&kode_trxtype=<?php echo $data1['kode_trxtype']; ?>&kode_email=<?php echo $data1['kode_email']; ?>&tgl_create=<?php echo $data1['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data1['kode_trxtype'] . $angka); ?>"
                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php }  ?>
                    </tbody>

                  </table>
                </table>
              </table>
            </div>
          </div>
        </div>


        <!--  -->
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title"><?php echo 'DOKUMEN PENGINGAT ' ?><?php echo $tampil['deskripsi'] ?></h4>
          </div>
          <div class="card-body">
            <a href="?page=jatuh_tempo&aksi=p_tambah&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>"
              class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>

            <div class="table-responsive">
              <table id="zero_config">
                <table class="table table-striped table-bordered datatable-select-inputs">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Aktiva </th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Durasi</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Periode</th>                        
                        <th scope="col" style="text-align:center; vertical-align:middle;">Jam</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Status Reminder</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva 
                         -- inner join pb_transaksi.tb_aktiva_detail c on a.kode_aktiva=c.kode_aktiva
                                            
                        where a.status='A' and kode_trxtype='$kode_trxtype' order by end");
                        while ($data = $sql->fetch_assoc()) {
                        // $file = $data['file'];

                        // $kode_aktiva = $data['kode_aktiva']; --bisa menggunakan ini jika tidak mau mendeklarasikan dengan '""' dibawah \\

                        $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                        $tampil_cari_plat = $sql_cari_plat->fetch_assoc();

                                               

                       ?>
                      <tr>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $no++; ?></td>
                        <!-- <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['kode_pengingat']; ?>
                        </td> -->
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['deskripsi_aktiva']; ?>
                          (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)
                        </td>
                        <!-- <td style="text-align:center; vertical-align:middle;">
                         <?php echo $data['kode_trxtype']; ?></td> -->

                        <td style="text-align:center; vertical-align:middle;">
                          <b><?php echo strftime("%d %B %Y", strtotime($data['start'])); ?></b>
                          <?php if ($data['start']<>$data['end']) {?> <br>s/d <br>
                          <b><?php echo strftime("%d %B %Y", strtotime($data['end'])); }?></b>
                        </td>
                 
                        
                        <td style="text-align:center; vertical-align:middle;">
                        <!-- <?php echo strftime("%A, %d %B %Y", strtotime($data['periode'])); ?> -->
                        <!-- <?php echo $data['periode']; ?> -->

                       <?php if ($data['periode'] == null) { ?>
                          <?php echo "-";?>
                       <?php } else { ?>
                            
                            <?php if ($data['flag_periode']== 'T') {?>
                              <?php echo strftime("%d %B", strtotime($data['periode'])); ?>

                            <?php } else { ?>
                              <?php echo $data['periode']; ?>
                            <?php } ?>

                       <?php } ?>   
                       <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['time']; ?>
                        </td>
                       <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['deskripsi']; ?>
                        </td>

                        </td>
                        <td style="text-align:center; vertical-align:middle;">
                        <?php if ($data['status_reminder'] == 'AKTIF') { ?>
                       
                        <a 
                            href="?page=jatuh_tempo&aksi=p_on&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                            class="btn btn-warning btn-md"><b>ON</b></a>
                          <?php } else  { ?>
                            <a 
                            href="?page=jatuh_tempo&aksi=p_off&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>"
                            class="btn btn-dark btn-md"><b>OFF</b></a>
                       <?php   } ?>
                        
                       </td>
                       <td style="text-align:center; vertical-align:middle;"> 
                       <a href="?page=jatuh_tempo&aksi=p_ubah&&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                       <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')"
                        href="?page=jatuh_tempo&aksi=p_hapus&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&kode_pengingat=<?php echo $data['kode_pengingat']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          
                        </td>
                      </tr>
                      <?php }  ?>
                    </tbody>
                  </table>
                </table>
              </table>
            </div>
          </div>
        </div>
                <!--  -->

      </div>
    </div>

</section>
