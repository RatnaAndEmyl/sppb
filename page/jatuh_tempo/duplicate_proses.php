<?php 
include '..\..\koneksi.php';

 $kode_trxtype_awal          = $_POST['kode_trxtype_awal'];
 $referensi          = $_POST['referensi'];
 $jenis_duplikat          = $_POST['jenis_duplikat'];
 $data_duplikat          = $_POST['data_duplikat'];

//   echo $referensi.'<br>';
//   echo $jenis_duplikat.'<br>';
//   echo $data_duplikat.'<br>';
//   echo $kode_trxtype_awal.'<br>';


$simpan = $_POST ['simpan'];
if ($simpan) {

    if ($data_duplikat == 'email' and $jenis_duplikat == 'kosongkan') {
        $sqltext ="DELETE from pb_transaksi.tb_pengingat_email where kode_trxtype='$kode_trxtype_awal'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat_email select '$kode_trxtype_awal',a.kode_email,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat_email a where a.kode_trxtype='$referensi' and a.status='A'";
        $sql = $koneksi_master->query("$sqltext");
        // echo $sqltext.'<br>';

    } elseif ($data_duplikat == 'email' and $jenis_duplikat == 'ambil') {

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat_email select '$kode_trxtype_awal',a.kode_email,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat_email a where a.kode_trxtype='$referensi' and a.status='A' and not exists (select x.kode_email from pb_transaksi.tb_pengingat_email x where x.kode_email=a.kode_email and x.kode_trxtype='$kode_trxtype_awal' and x.status='A' and a.status='A')";
        $sql = $koneksi_master->query("$sqltext");

    } else if ($data_duplikat == 'pengingat' and ($jenis_duplikat == 'kosongkan' or $jenis_duplikat == 'ambil')) {
        $sqltext ="DELETE from pb_transaksi.tb_pengingat where kode_trxtype='$kode_trxtype_awal'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat select a.kode_pengingat,a.kode_aktiva,'$kode_trxtype_awal',a.ulang,a.start,a.end,a.time,a.deskripsi,a.flag_periode,a.flag_bulan,a.periode,a.status_reminder,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat a where a.kode_trxtype='$referensi' and a.status='A'";
        $sql = $koneksi_master->query("$sqltext");

    } else if ($data_duplikat=='all' and $jenis_duplikat=='kosongkan') {
        $sqltext ="DELETE from pb_transaksi.tb_pengingat_email where kode_trxtype='$kode_trxtype_awal'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="DELETE from pb_transaksi.tb_pengingat where kode_trxtype='$kode_trxtype_awal'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat_email select '$kode_trxtype_awal',a.kode_email,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat_email a where a.kode_trxtype='$referensi' and a.status='A'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat select a.kode_pengingat,a.kode_aktiva,'$kode_trxtype_awal',a.ulang,a.start,a.end,a.time,a.deskripsi,a.flag_periode,a.flag_bulan,a.periode,a.status_reminder,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat a where a.kode_trxtype='$referensi' and a.status='A'";
        echo $sqltext;
        $sql = $koneksi_master->query("$sqltext");

    } else if ($data_duplikat=='all' and $jenis_duplikat=='ambil') {
        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat_email select '$kode_trxtype_awal',a.kode_email,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat_email a where a.kode_trxtype='$referensi' and a.status='A' and not exists (select x.kode_email from pb_transaksi.tb_pengingat_email x where x.kode_email=a.kode_email and x.kode_trxtype='$kode_trxtype_awal' and x.status='A' and a.status='A')";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="DELETE from pb_transaksi.tb_pengingat where kode_trxtype='$kode_trxtype_awal'";
        $sql = $koneksi_master->query("$sqltext");

        $sqltext ="INSERT INTO pb_transaksi.tb_pengingat select a.kode_pengingat,a.kode_aktiva,'$kode_trxtype_awal',a.ulang,a.start,a.end,a.time,a.deskripsi,a.flag_periode,a.flag_bulan,a.periode,a.status_reminder,'A',null,'$kode_user',null,null,null,null from pb_transaksi.tb_pengingat a where a.kode_trxtype='$referensi' and a.status='A'";
        $sql = $koneksi_master->query("$sqltext");
    }
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert ("Data Berhasil Disimpan")
             window.location.href = "?page=jatuh_tempo";
        </script>
        <?php
    }else {?>
        <script type="text/javascript">
			alert ("Data Gagal Disimpan");
		  window.location.href = "?page=jatuh_tempo&aksi=duplicate&kode_trxtype=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user.$angka); ?>";
        </script>
    	<?php
    }


} ?>