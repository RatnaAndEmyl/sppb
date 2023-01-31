<?php
include '..\..\koneksi.php';

$kode_aktiva   = $_POST['kode_aktiva'];
$kode_trxtype   = $_POST['kode_trxtype'];
$ulang   = $_POST['ulang'];
$start   = $_POST['start'];
$end   = $_POST['end'];
$time   = $_POST['time'];

$deskripsi   = $_POST['deskripsi'];
$flag_periode   = $_POST['flag_periode'];
$flag_bulan   = $_POST['flag_bulan'];

// $periode   = $_POST['periode'];

$simpan       = $_POST['simpan'];
if ($simpan) {

      if ($ulang=='1') {

        // echo $kode_aktiva.'<br>';
        // echo $kode_trxtype.'<br>';
        // echo $ulang.'<br>';
        // echo $start.'<br>';
        // echo $end.'<br>';
        // echo $flag_periode.'<br>';
        // untuk pengecekan data sudah ada
        $sql_pengecekan = $koneksi_master->query("SELECT count(kode_pengingat) 'jumlah' FROM pb_transaksi.tb_pengingat where status='A' and kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype' and ulang='$ulang' and start='$start'  and end='$start'");
        $tampil_pengecekan = $sql_pengecekan->fetch_assoc();
        // echo $tampil_pengecekan['jumlah'];

        if ($tampil_pengecekan['jumlah'] > 0) {?>
        <script type="text/javascript">
            alert("Data Sudah Ada")
        </script>
      <?php } 

        $sqltext = "INSERT INTO pb_transaksi.tb_pengingat values(null,'$kode_aktiva','$kode_trxtype','$ulang','$start','$start','$time',upper('$deskripsi'),null,null,null,'AKTIF','A',null,'$kode_user',null,null,null,null)";
        $sql = $koneksi_master->query("$sqltext");
        //  echo $sqltext.'<br>';

      } else {
        if($flag_bulan<>null) {
          foreach ($_POST['periode'] as $periode) {
            // echo $kode_aktiva.'<br>';
            // echo $kode_trxtype.'<br>';
            // echo $ulang.'<br>';
            // echo $start.'<br>';
            // echo $end.'<br>';
            // echo $flag_periode.'<br>';
            // echo $flag_bulan.'<br>';
            // echo $periode.'<br>';

            $sql_pengecekan = $koneksi_master->query("SELECT count(kode_pengingat) 'jumlah' FROM pb_transaksi.tb_pengingat where status='A' and kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype' and ulang='$ulang' and start='$start'  and end='$end' and flag_periode='$flag_periode' and flag_bulan = '$flag_bulan' and periode='$periode'");
            $tampil_pengecekan = $sql_pengecekan->fetch_assoc();
            // echo $tampil_pengecekan['jumlah'];

            if ($tampil_pengecekan['jumlah'] > 0) {?>
            <script type="text/javascript">
                alert("Data Sudah Ada")
            </script>
          <?php }
          
            // echo $periode;
          $sqltext = "INSERT INTO pb_transaksi.tb_pengingat values(null,'$kode_aktiva','$kode_trxtype','$ulang','$start','$end','$time',upper('$deskripsi'),'$flag_periode','$flag_bulan','$periode','AKTIF','A',null,'$kode_user',null,null,null,null)";
          $sql = $koneksi_master->query("$sqltext");
          // echo $sqltext;
        
            }
          } else {
              foreach ($_POST['periode'] as $periode) {
            // echo $kode_aktiva.'<br>';
            // echo $kode_trxtype.'<br>';
            // echo $ulang.'<br>';
            // echo $start.'<br>';
            // echo $end.'<br>';
            // echo $flag_periode.'<br>';
            // echo $periode.'<br>';

            $sql_pengecekan = $koneksi_master->query("SELECT count(kode_pengingat) 'jumlah' FROM pb_transaksi.tb_pengingat where status='A' and kode_aktiva='$kode_aktiva' and kode_trxtype='$kode_trxtype' and ulang='$ulang' and start='$start' and end='$end' and flag_periode='$flag_periode' and periode='$periode'");
            $tampil_pengecekan = $sql_pengecekan->fetch_assoc();
            // echo $tampil_pengecekan['jumlah'];

            if ($tampil_pengecekan['jumlah'] > 0) {?>
            <script type="text/javascript">
                alert("Data Sudah Ada")
            </script>
           <?php }

                // echo $periode;
              $sqltext = "INSERT INTO pb_transaksi.tb_pengingat values(null,'$kode_aktiva','$kode_trxtype','$ulang','$start','$end','$time',upper('$deskripsi'),'$flag_periode',null,'$periode','AKTIF','A',null,'$kode_user',null,null,null,null)";
              $sql = $koneksi_master->query("$sqltext");
              // echo $sqltext;

            }
          }

        } 
  if ($sql) {
    
?>
    <script type="text/javascript">
      alert("Data Berhasil Disimpan")

       window.location.href = "?page=home";
      //  href="?page=home&halaman=1"
      //  window.location.href = "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&kode_aktiva=<?php echo $kode_aktiva; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";
       
      //  "?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $kode_trxtype; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_trxtype . $angka); ?>";

    </script>
  <?php
  } else { ?>
    <script type="text/javascript">
      alert("Data Gagal Disimpan");
       window.location.href = "?page=home&halaman=1";
    </script>
<?php }
}
?>