<?php
$koneksi_master = new mysqli("localhost", "root", "", "pb_transaksi");

// $deskripsi = $_GET['deskripsi'];

$angka = date('Ymdhis');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

?>

<table>
  <tr>
    <td align="center" style="width: 2000px;"><font style="font-size: 18px"><b>PT SINAR NUSANTARA INDUSTRIES  <br> GENERAL APPAIR</b></font>
      <br>Jl. A. Yani KM. 33 Desa Liang Anggang, Kec. Bati-bati, Tanah Laut, Kalimantan Selatan</td>
      
    </tr>
  </table>
  <hr>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN BARANG KELUAR </u></p>


<table border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
  <tr border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
    <th scope="col" style="text-align:center; vertical-align:middle; width: 50px;">No.</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Tanggal</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Kode BBK</th>
    <!-- <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Gudang</th> -->
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Pemohon</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jabatan</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">Nama Barang</th>
    <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Jumlah Barang</th>
    <!-- <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Admin</th> -->
  </tr>
  <tbody>
    <?php
    $kode = 1;



    $sql = $koneksi_master->query("SELECT a.pemohon, a.kode_bbk, a.tanggal_bbk, a.kode_gudang, a.create_by, a.jabatan FROM pb_transaksi.tb_bbk a WHERE a.status='A' ORDER BY  tanggal_bbk DESC");

    while ($data = $sql->fetch_assoc()) {

      $kode_bbk = $data['kode_bbk'];


      $sql_cari_barang = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE status='A' and kode_bbk='$kode_bbk'");
      $data_cari_barang = $sql_cari_barang->fetch_assoc();

      $sql_cari_gudang = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk a inner join pb_master.tb_gudang b WHERE a.status='A' ");
      $data_cari_gudang = $sql_cari_gudang->fetch_assoc();

      $sql_cari_admin = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk a inner join pb_role.tb_user b WHERE a.status='A' ");
      $data_cari_admin = $sql_cari_admin->fetch_assoc();

      // $sql_cari_driver = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_bbk_detail WHERE kode_trxtype='TRX000005' and status='A' and kode_bbk='$kode_bbk'");
      // $data_cari_driver = $sql_cari_driver->fetch_assoc();



    ?>

      <tr>
        <td style="text-align:center; vertical-align:middle;"><?php echo $kode++; ?></td>
        <td style="text-align:center; vertical-align:middle;"> <?php echo strftime ("%d %B %Y", strtotime($data['tanggal_bbk']));?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_bbk']; ?></td>
        <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_gudang['nama_gudang']; ?></td> -->
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['pemohon']; ?></td>
        <td style="text-align:center; vertical-align:middle;"><?php echo $data['jabatan']; ?></td>

        <td style="text-align:center; vertical-align:middle;">
        <?php if ($data_cari_barang['nama_barang']==NULL){
            echo '-';
        } else {?>
        <?php echo $data_cari_barang['nama_barang']; ?>
     <?php   } ?>
        </td>


        <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_barang['jumlah_pemenuhan']; ?></td>
        <!-- <td style="text-align:center; vertical-align:middle;"><?php echo $data['create_by']; ?></td> -->
       



      </tr>

      
    <?php }  ?>

    
  </tbody>
  
</table>

<div class="kanan">
    <p>Mengetahui :<br>Admin General Appair </p>
    <br>
    <br>
    <br>
    <p><b><u>Ratna Dewi Arianti</u><br>NIK: 2022100004</b></p>
  </div>
<style>
  div.kanan {
 width:300px;
 float:right;
}
</style>