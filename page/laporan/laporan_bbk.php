<?php
$koneksi_master = new mysqli("localhost", "root", "", "pb_transaksi");

// $deskripsi = $_GET['deskripsi'];

$angka = date('Ymdhis');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

?>

<table border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
  <tr>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 50px;">No.</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Kode BBK</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Kode Permintaan</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">Nama Barang</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Jumlah Barang</th>
    <!-- <th scope="col" style="text-align:center; vertical-align:middle; width: 100;">Keterangan</th> -->
  </tr>
  <tbody>
    <?php
    $kode = 1;



    $sql = $koneksi_master->query("SELECT a.pemohon, a.kode_bbk FROM pb_transaksi.tb_bbk a WHERE a.status='A'");
    while ($data = $sql->fetch_assoc()) {

      $kode_bbk = $data['kode_bbk'];

      // echo $kode_bbk;

      $sql_cari_plat_baru = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE status='A' and kode_bbk='$kode_bbk'");
      $data_cari_plat_baru = $sql_cari_plat_baru->fetch_assoc();

      // $sql_cari_driver = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000005' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_driver = $sql_cari_driver->fetch_assoc();

      // $sql_cari_ket_asuransi = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000001' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_ket_asuransi = $sql_cari_ket_asuransi->fetch_assoc();

      // $sql_cari_jatuh_tempo_polis = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000006' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_jatuh_tempo_polis = $sql_cari_jatuh_tempo_polis->fetch_assoc();

      // $sql_cari_nama_asuransi = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000002' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_nama_asuransi = $sql_cari_nama_asuransi->fetch_assoc();

      // $sql_cari_plat_lama = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000007' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_plat_lama = $sql_cari_plat_lama->fetch_assoc();

      // $sql_cari_kepemilikan = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000008' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_kepemilikan = $sql_cari_kepemilikan->fetch_assoc();

      // $sql_cari_tahun_pembuatan = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000009' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_tahun_pembuatan = $sql_cari_tahun_pembuatan->fetch_assoc();

      // $sql_cari_jatuh_tempo_kir = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000010' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_jatuh_tempo_kir = $sql_cari_jatuh_tempo_kir->fetch_assoc();

      // $sql_cari_jatuh_tempo_pjk = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000011' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_jatuh_tempo_pjk = $sql_cari_jatuh_tempo_pjk->fetch_assoc();

      // $sql_cari_jatuh_tempo_plat = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000012' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_jatuh_tempo_plat = $sql_cari_jatuh_tempo_plat->fetch_assoc();

      // $sql_cari_lokasi = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000013' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_lokasi = $sql_cari_lokasi->fetch_assoc();

      // $sql_cari_periode = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000014' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_periode = $sql_cari_periode->fetch_assoc();

      // $sql_cari_keterangan = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000014' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_keterangan = $sql_cari_keterangan->fetch_assoc();
      //untuk memanggil data di tabel


    ?>

      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $kode++; ?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_bbk']; ?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
        <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_driver['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_ket_asuransi['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo strftime("%d %B %Y", strtotime($data_cari_jatuh_tempo_polis['tgl_jatuh_tempo'])); ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_nama_asuransi['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_plat_lama['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_kepemilikan['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_tahun_pembuatan['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo strftime("%d %B %Y", strtotime($data_cari_jatuh_tempo_kir['tgl_jatuh_tempo'])); ?>
        </td>

        <td style="text-align:center; vertical-align:middle;"><?php echo strftime("%d %B %Y", strtotime($data_cari_jatuh_tempo_pjk['tgl_jatuh_tempo'])); ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo strftime("%d %B %Y", strtotime($data_cari_jatuh_tempo_plat['tgl_jatuh_tempo'])); ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_lokasi['deskripsi_bbk']; ?></td>

        <td style="text-align:center; vertical-align:middle;">
          <?php echo strftime("%B %Y", strtotime($data_cari_periode['periode_awal'])); ?>-
          <?php echo strftime("%B %Y", strtotime($data_cari_periode['periode_akhir'])); ?></td>

        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_keterangan['deskripsi_bbk']; ?></td> -->



      </tr>
    <?php }  ?>
  </tbody>
</table>