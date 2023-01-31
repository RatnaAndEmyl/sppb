<?php
    include "..\\..\\koneksi.php";

    
$referensi = $_POST['referensi'];
$jenis_duplikat = $_POST['jenis_duplikat'];
$data_duplikat = $_POST['data_duplikat'];
$kode_trxtype_awal = $_POST['kode_trxtype_awal'];

// echo $referensi.'<br>';
// echo $jenis_duplikat.'<br>';
// echo $data_duplikat.'<br>';
// echo $kode_trxtype_awal.'<br>';
    ?>


<?php if ($data_duplikat == 'email' and $jenis_duplikat == 'kosongkan') {?>

<table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Trxtype</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Email</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
         $sqltext= $koneksi_master->query("SELECT * from pb_transaksi.tb_pengingat_email a join pb_master.tb_email b on a.kode_email=b.kode_email  where a.status='A' and b.status='A' and a.kode_trxtype='$referensi' ");

            while ($data=$sqltext->fetch_assoc()) {
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $no++;?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_trxtype'];?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['email'];?></td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if email -->

  </table>
</table>
<?php } elseif ($data_duplikat == 'email' and $jenis_duplikat == 'ambil') {?>
<table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Trxtype</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Email</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
         $sqltext= $koneksi_master->query("SELECT * from pb_transaksi.tb_pengingat_email a join pb_master.tb_email b on a.kode_email=b.kode_email  where b.status='A' AND a.status='A' and a.kode_trxtype='$referensi' and not exists (select x.kode_email from pb_transaksi.tb_pengingat_email x where x.kode_email=a.kode_email and x.kode_trxtype='$kode_trxtype_awal' and x.status='A' and a.status='A') ");

            while ($data=$sqltext->fetch_assoc()) {
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $no++;?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_trxtype'];?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['email'];?></td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if email -->

  </table>
</table>
<?php }  elseif ($data_duplikat == 'pengingat' and ($jenis_duplikat == 'kosongkan' or $jenis_duplikat == 'ambil')) {?>
<table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Aktiva</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Durasi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Periode</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Jam</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Status Reminder</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
        $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva where a.status='A' and b.status='A' and a.kode_trxtype='$referensi'  order by kode_pengingat");

        while ($data=$sql->fetch_assoc()) {
                $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                $tampil_cari_plat = $sql_cari_plat->fetch_assoc();
                
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;">
          <?php echo $no++; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi_aktiva']; ?>
          (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)
        </td>

        <td style="text-align:left; vertical-align:middle;">
          <b><?php echo strftime("%d %B %Y", strtotime($data['start'])); ?></b>
          <?php if ($data['start']<>$data['end']) {?> s/d <br>
          <b><?php echo strftime("%d %B %Y", strtotime($data['end'])); }?></b>
        </td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
          <?php if ($data['periode'] == null) { ?>
          <?php echo "-";?>
          <?php } else { ?>

          <?php if ($data['flag_periode']== 'T') {?>
          <?php echo strftime("%d %B", strtotime($data['periode'])); ?>

          <?php } else { ?>
          <?php echo $data['periode']; ?>
          <?php } ?>

          <?php } ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['time']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['status_reminder']; ?>
        </td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if pengingat -->

  </table>
</table>
<?php } elseif ($data_duplikat=='all' and $jenis_duplikat=='kosongkan') { ?>

    <table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Trxtype</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Email</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
         $sqltext= $koneksi_master->query("SELECT * from pb_transaksi.tb_pengingat_email a join pb_master.tb_email b on a.kode_email=b.kode_email  where a.status='A' and b.status='A' and a.kode_trxtype='$referensi' ");

            while ($data=$sqltext->fetch_assoc()) {
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $no++;?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_trxtype'];?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['email'];?></td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if email -->

  </table>
</table>


<table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Aktiva</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Durasi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Periode</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Jam</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Status Reminder</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
        $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva where a.status='A' and b.status='A' and a.kode_trxtype='$referensi'  order by kode_pengingat");

        while ($data=$sql->fetch_assoc()) {
                $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                $tampil_cari_plat = $sql_cari_plat->fetch_assoc();
                
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;">
          <?php echo $no++; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi_aktiva']; ?>
          (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)
        </td>

        <td style="text-align:left; vertical-align:middle;">
          <b><?php echo strftime("%d %B %Y", strtotime($data['start'])); ?></b>
          <?php if ($data['start']<>$data['end']) {?> s/d <br>
          <b><?php echo strftime("%d %B %Y", strtotime($data['end'])); }?></b>
        </td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
          <?php if ($data['periode'] == null) { ?>
          <?php echo "-";?>
          <?php } else { ?>

          <?php if ($data['flag_periode']== 'T') {?>
          <?php echo strftime("%d %B", strtotime($data['periode'])); ?>

          <?php } else { ?>
          <?php echo $data['periode']; ?>
          <?php } ?>

          <?php } ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['time']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['status_reminder']; ?>
        </td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if all kosong -->

  </table>
</table>

<?php } elseif ($data_duplikat=='all' and $jenis_duplikat=='ambil') {?>
    <table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Trxtype</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Email</th>
      </tr>
    </thead>
    <tbody>

      <?php
        $no = 1;
         $sqltext= $koneksi_master->query("SELECT * from pb_transaksi.tb_pengingat_email a join pb_master.tb_email b on a.kode_email=b.kode_email  where b.status='A' AND a.status='A' and a.kode_trxtype='$referensi' and not exists (select x.kode_email from pb_transaksi.tb_pengingat_email x where x.kode_email=a.kode_email and x.kode_trxtype='$kode_trxtype_awal' and x.status='A' and a.status='A')");

            while ($data=$sqltext->fetch_assoc()) {
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $no++;?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_trxtype'];?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['email'];?></td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if email -->

  </table>
</table>


<table id="zero_config">
  <table class="table table-striped table-bordered datatable-select-inputs">
    <thead>
      <tr>
        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Kode Aktiva</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Durasi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Periode</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Jam</th>
        <th scope="col" style="text-align:center; vertical-align:middle;">Status Reminder</th>
      </tr>
    </thead>
    <tbody>


      <?php
        $no = 1;
        $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_pengingat a inner join pb_transaksi.tb_aktiva b on a.kode_aktiva=b.kode_aktiva where a.status='A' and b.status='A' and a.kode_trxtype='$referensi'  order by kode_pengingat");

        while ($data=$sql->fetch_assoc()) {
                $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                $tampil_cari_plat = $sql_cari_plat->fetch_assoc();
                
         ?>
      <tr>
        <td style="text-align:center; vertical-align:middle;">
          <?php echo $no++; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi_aktiva']; ?>
          (<?php echo $tampil_cari_plat['deskripsi_aktiva']; ?>)
        </td>

        <td style="text-align:left; vertical-align:middle;">
          <b><?php echo strftime("%d %B %Y", strtotime($data['start'])); ?></b>
          <?php if ($data['start']<>$data['end']) {?> s/d <br>
          <b><?php echo strftime("%d %B %Y", strtotime($data['end'])); }?></b>
        </td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo $data['deskripsi']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
          <?php if ($data['periode'] == null) { ?>
          <?php echo "-";?>
          <?php } else { ?>

          <?php if ($data['flag_periode']== 'T') {?>
          <?php echo strftime("%d %B", strtotime($data['periode'])); ?>

          <?php } else { ?>
          <?php echo $data['periode']; ?>
          <?php } ?>

          <?php } ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['time']; ?>
        </td>
        <td style="text-align:center; vertical-align:middle;">
             <?php echo $data['status_reminder']; ?>
        </td>
      </tr>
      <?php }  ?>
    </tbody>
    <!-- punya if email -->

  </table>
</table>
<?php }?>