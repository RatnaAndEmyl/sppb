<?php
$koneksi_master = new mysqli("localhost","root","","pb_transaksi");

// $deskripsi = $_GET['deskripsi'];

$angka = date('Ymdhis');
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

?>

<table border="1" style="width: 100%;margin: auto;border-collapse: collapse;border: 2px solid black;text-align: center;">
            
  
                    <tr>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 50px;">No.</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 200px;">Jenis Kendaraan</th>  
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">No PLAT</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 300px;">Nama Driver</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 250px;">Keterangan Asuransi</th>  
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 400;">Jatuh Tempo POLIS Asuransi</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 350;">Nama Asuransi</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 250;">PLAT Lama</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 200;">Kepemilikan</th> 
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 100;">Tahun Pembuatan</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 450;">Jatuh Tempo KIR</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 350;">Jatuh Tempo Pjk Tahunan</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 350;">Jatuh Tempo PLAT/STNK</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 150;">Lokasi Pengurusan Srt</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 300;">Periode</th>
                    <th scope="col" style="text-align:center; vertical-align:middle; width: 100;">Keterangan</th>
                    </tr>
                    <tbody>
                    <?php
                                        $kode = 1;

                                       

                                      $sql = $koneksi_master->query("select a.deskripsi_aktiva, a.kode_aktiva from pb_transaksi.tb_aktiva a where a.status='A'");
                                      while ($data = $sql->fetch_assoc()) {

                                        $kode_aktiva = $data['kode_aktiva'];

                                        // echo $kode_aktiva;

                                        $sql_cari_plat_baru = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000004' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_plat_baru=$sql_cari_plat_baru->fetch_assoc();
                                        
                                        $sql_cari_driver = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000005' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_driver=$sql_cari_driver->fetch_assoc();

                                        $sql_cari_ket_asuransi = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000001' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_ket_asuransi=$sql_cari_ket_asuransi->fetch_assoc();
                                
                                        $sql_cari_jatuh_tempo_polis = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000006' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_jatuh_tempo_polis=$sql_cari_jatuh_tempo_polis->fetch_assoc();

                                        $sql_cari_nama_asuransi = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000002' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_nama_asuransi=$sql_cari_nama_asuransi->fetch_assoc();

                                        $sql_cari_plat_lama = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000007' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_plat_lama=$sql_cari_plat_lama->fetch_assoc();
                                        
                                        $sql_cari_kepemilikan = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000008' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_kepemilikan=$sql_cari_kepemilikan->fetch_assoc();

                                        $sql_cari_tahun_pembuatan = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000009' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_tahun_pembuatan=$sql_cari_tahun_pembuatan->fetch_assoc();

                                        $sql_cari_jatuh_tempo_kir = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000010' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_jatuh_tempo_kir=$sql_cari_jatuh_tempo_kir->fetch_assoc();

                                        $sql_cari_jatuh_tempo_pjk = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000011' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_jatuh_tempo_pjk=$sql_cari_jatuh_tempo_pjk->fetch_assoc();

                                        $sql_cari_jatuh_tempo_plat = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000012' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_jatuh_tempo_plat=$sql_cari_jatuh_tempo_plat->fetch_assoc();

                                        $sql_cari_lokasi = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000013' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_lokasi =$sql_cari_lokasi ->fetch_assoc();

                                        $sql_cari_periode = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000014' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_periode=$sql_cari_periode->fetch_assoc();

                                        $sql_cari_keterangan = $koneksi_master ->query("select * from pb_transaksi.tb_aktiva_detail where kode_trxtype='TRX000014' and status='A' and kode_aktiva='$kode_aktiva'");
                                        $data_cari_keterangan=$sql_cari_keterangan->fetch_assoc();
                                        //untuk memanggil data di tabel

                                        
                                        ?>

                                          <tr>
                                              <td style="text-align:center; vertical-align:middle;"><?php echo $kode++;?></td> 
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['deskripsi_aktiva'];?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_plat_baru['deskripsi_aktiva'];?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_driver['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_ket_asuransi['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;">
                                             <?php echo strftime ("%d %B %Y", strtotime($data_cari_jatuh_tempo_polis['tgl_jatuh_tempo']));?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_nama_asuransi['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_plat_lama['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_kepemilikan['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_tahun_pembuatan['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;">
                                             <!-- <?php echo $data_cari_jatuh_tempo_kir['tgl_jatuh_tempo'];?></td> -->
                                             <?php echo strftime ("%d %B %Y", strtotime($data_cari_jatuh_tempo_kir['tgl_jatuh_tempo']));?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo strftime ("%d %B %Y", strtotime($data_cari_jatuh_tempo_pjk['tgl_jatuh_tempo']));?></td>
                                        
                                             <td style="text-align:center; vertical-align:middle;">
                                             <?php echo strftime ("%d %B %Y", strtotime($data_cari_jatuh_tempo_plat['tgl_jatuh_tempo']));?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_lokasi['deskripsi_aktiva'];?></td>

                                             <td style="text-align:center; vertical-align:middle;">                                            
                                             <?php echo strftime ("%B %Y", strtotime($data_cari_periode['periode_awal']));?>-
                                             <?php echo strftime ("%B %Y", strtotime($data_cari_periode['periode_akhir']));?></td>

                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data_cari_keterangan['deskripsi_aktiva'];?></td>
                                          
                                        
                                             
                                              </tr>   
                                            <?php }  ?>
                                               </tbody> 
                                               </table> 