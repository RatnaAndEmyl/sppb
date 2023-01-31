
<?php
if ($_POST['cetak'] == 'Cetak Pdf') {
?><script type="text/javascript">
    window.print()
  </script>

<?php
} else
if ($_POST['cetak'] == 'Cetak Excel') {
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=laporanstok.xls");
}
?>

<?php
$koneksi_master = new mysqli("localhost", "root", "", "pb_transaksi");

// $deskripsi = $_GET['deskripsi'];

$angka = date('Ymdhis');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal
?>
<?php
if (isset($_POST['cetak'])) { ?>

  <?php

  //  echo $_POST['cetak']. '<br>';
  $dari_tgl = $_POST['dari_tgl'];
  $sampai_tgl = $_POST['sampai_tgl'];
  $kode_gudangstok = $_POST['kode_gudangstok'];

  ?>

  <style>
    th,
    td {
      white-space: nowrap;
    }

    div.dataTables_wrapper {
      /* width: 800px; */
      margin: 0 auto;

    }
  </style>

  <table>
    <tr>
      <td align="center" style="width: 2000px;">
        <font style="font-size: 18px"><b>PT SINAR NUSANTARA INDUSTRIES <br> GENERAL AFFAIR</b></font>
        <br>Jl. A. Yani KM. 33 Desa Liang Anggang, Kec. Bati-bati, Tanah Laut, Kalimantan Selatan
      </td>

    </tr>
  </table>
  <hr>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN STOK </u></p>


  <table border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
    <tr border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
      <th scope="col" style="text-align:center; vertical-align:middle; width: 50px;">No.</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Tanggal</th>
      <!-- <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Kode</th> -->
      <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Gudang</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Pemohon</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jabatan</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jenis Modul</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">Nama Barang</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Awal</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Masuk</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok Keluar</th>
      <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Stok AKhir</th>
    </tr>
    <tbody>
      <?php
      $no = 1;

      $sqltext = "SELECT a.pemohon, a.tgl_create, a.kode_gudang, a.kode, a.create_by, a.nama_barang, a.jenis_modul, b.nama_gudang, a.stok_awal, a.stok_masuk, a.stok_keluar, a.stok_akhir FROM pb_transaksi.tb_history_stok a INNER JOIN pb_master.tb_gudang b ON a.kode_gudang=b.kode_gudang WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' AND a.status='A' AND b.status='A' ORDER BY  a.tgl_create ASC";
      $sql = $koneksi_master->query($sqltext);
      // echo $sqltext . '<br>';

      while ($data = $sql->fetch_assoc()) {

        $kode = $data['kode'];
        $jenis_modul = $data['jenis_modul'];
        // echo $jenis_modul. '<br>';

        // $sql_cari_departemen = $koneksi_master->query("SELECT a.nik, c.jabatan, d.nama_departemen, e.nama_subdepartemen FROM pb_transaksi.tb_permintaan a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan d ON b.kode_departemen=d.kode_departemen INNER JOIN pb_master.tb_subdepartemen_karyawan e ON b.kode_subdepartemen=e.kode_subdepartemen WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' a.status='A' and b.status='A' AND kode_permintaan='$kode'");
        // $data_cari_departemen = $sql_cari_departemen->fetch_assoc();

        // $sql_cari_departemen_po = $koneksi_master->query("SELECT a.nik, c.jabatan, d.nama_departemen, e.nama_subdepartemen FROM pb_transaksi.tb_po a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan d ON b.kode_departemen=d.kode_departemen INNER JOIN pb_master.tb_subdepartemen_karyawan e ON b.kode_subdepartemen=e.kode_subdepartemen WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' a.status='A' and b.status='A' AND kode_po='$kode'");
        // $data_cari_departemen_po = $sql_cari_departemen_po->fetch_assoc();

        // $sql_cari_departemen_adj = $koneksi_master->query("SELECT a.nik, a.username, c.jabatan, d.nama_departemen, e.nama_subdepartemen FROM pb_transaksi.tb_adjustment a INNER JOIN pb_master.tb_karyawan b ON a.nik=b.nik INNER JOIN pb_master.tb_jabatan_karyawan c ON b.kode_jabatan=c.kode_jabatan INNER JOIN pb_master.tb_departemen_karyawan d ON b.kode_departemen=d.kode_departemen INNER JOIN pb_master.tb_subdepartemen_karyawan e ON b.kode_subdepartemen=e.kode_subdepartemen WHERE a.tgl_create BETWEEN '$dari_tgl' AND '$sampai_tgl' AND a.kode_gudang='$kode_gudangstok' a.status='A' and b.status='A' AND kode_adjustment='$kode'");
        // $data_cari_departemen_adj = $sql_cari_departemen_adj->fetch_assoc();



      ?>

        <tr>
          <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
          <td style="text-align:center; vertical-align:middle;"> <?php echo strftime("%d %B %Y", strtotime($data['tgl_create'])); ?></td>
          <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode']; ?></td> -->
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_gudang']; ?></td>

          <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>

          <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen['jabatan']; ?> <?php echo $data_cari_departemen['nama_departemen']; ?> <?php echo $data_cari_departemen['nama_subdepartemen']; ?></td> -->

          <!-- <?php if ($jenis_modul == 'BBK') { ?>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen['jabatan']; ?> <?php echo $data_cari_departemen['nama_departemen']; ?> <?php echo $data_cari_departemen['nama_subdepartemen']; ?></td>
          <?php } elseif ($jenis_modul == 'BBM') { ?>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_po['jabatan']; ?> <?php echo $data_cari_departemen_po['nama_departemen']; ?> <?php echo $data_cari_departemen_po['nama_subdepartemen']; ?></td>
          <?php } elseif ($jenis_modul == 'ADJ IN') { ?>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['username']; ?></td>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['jabatan']; ?> <?php echo $data_cari_departemen_adj['nama_departemen']; ?> <?php echo $data_cari_departemen_adj['nama_subdepartemen']; ?></td>
          <?php } else { ?>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['username']; ?></td>
            <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_departemen_adj['jabatan']; ?> <?php echo $data_cari_departemen_adj['nama_departemen']; ?> <?php echo $data_cari_departemen_adj['nama_subdepartemen']; ?></td>
          <?php } ?> -->

          <td style="text-align:center; vertical-align:middle;"><?php echo $data['jenis_modul']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_barang']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_awal']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_masuk']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_keluar']; ?></td>
          <td style="text-align:center; vertical-align:middle;"><?php echo $data['stok_akhir']; ?></td>
        </tr>


      <?php }  ?>


    </tbody>

  </table>

  <div class="kanan">
    <p>Mengetahui :<br>Admin General Affair </p>
    <br>
    <br>
    <br>
    <p><b><u>Ratna Dewi Arianti</u><br>NIK: 2022100004</b></p>
  </div>
  <style>
    div.kanan {
      width: 300px;
      float: right;
    }
  </style>
<?php } ?>
