
<?php include '..\..\koneksi.php'; 
error_reporting('E_ALL|E_WARNING');
ob_start();
?>
   
    <?php
     if (isset($_POST['cetak']))
     {
        ?>

<br>




        <?php

        $dari_tgl=$_POST['dari_tgl'];
        $sampai_tgl=$_POST['sampai_tgl'];

       ?>


  <div class="table-responsive">

        <table border="1">
          <thead>
            <tr>
              <th>Kode Regu</th>
              <th>NIK</th>
              <th>Atasan 1</th>
              <th>Atasan 2</th>
              <th>Kode Jam Kerja</th>
              <th>Shift</th>
              <th>Jam Pulang Checklog</th>
              <th>Real Pulang</th>
              <th>Status Pulang</th>
              <th>Jam Breafing</th>
              <th>Real Breafing</th>
              <th>Status Breafing</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

              $sql = $koneksi_master ->query("select * from (select a.kdregu,a.nik, c.nik_atasan1, e.nama 'atasan1', c.nik_atasan2, f.nama 'atasan2',a.kodejamkerja,b.nama_regu,c.nama, d.nmjam_kerja, a.jam_masuk, a.real_masuk, a.status_masuk, a.jam_pulang, a.real_pulang, a.status_pulang, a.jam_breafing, a.real_breafing, a.status_breafing, a.shift from db_transaksi.tb_cek_kehadiran a join db_master.tb_regu b on a.kdregu=b.kdregu join db_master.tb_karyawan c on a.nik=c.nik join db_master.tb_jam_kerja d on a.kodejamkerja=d.kodejamkerja 
join db_master.tb_karyawan e on c.nik_atasan1=e.nik
join db_master.tb_karyawan f on c.nik_atasan2=f.nik
              where a.tgl='$dari_tgl' and a.kodejamkerja<>'OFF' union all
              select  a.kdregu,a.nik, c.nik_atasan1, e.nama 'atasan1', c.nik_atasan2, f.nama 'atasan2', a.kodejamkerja,b.nama_regu,c.nama, 'OFF KERJA', a.jam_masuk, a.real_masuk, a.status_masuk, a.jam_pulang, a.real_pulang, a.status_pulang, a.jam_breafing, a.real_breafing, a.status_breafing, a.shift from db_transaksi.tb_cek_kehadiran a join db_master.tb_regu b on a.kdregu=b.kdregu join db_master.tb_karyawan c on a.nik=c.nik   
join db_master.tb_karyawan e on c.nik_atasan1=e.nik
join db_master.tb_karyawan f on c.nik_atasan2=f.nik
              where a.tgl='$dari_tgl' and a.kodejamkerja='OFF') x order by x.nama_regu, x.nik_atasan1, x.nik_atasan2
              ");
                                        while ($data=$sql->fetch_assoc()) {

            ?>
              <tr>
                <td><?php echo $data['kdregu']." - ".$data['nama_regu']; ?></td>
                <td><?php echo $data['nik']." - ".$data['nama']; ?></td>
                <td><?php echo $data['nik_atasan1']." - ".$data['atasan1']; ?></td>
                <td><?php echo $data['nik_atasan2']." - ".$data['atasan2']; ?></td>
                <td><?php echo $data['kodejamkerja']." - ".$data['nmjam_kerja']; ?></td>
                <td><?php echo $data['shift']; ?></td>
                <td><?php echo $data['jam_pulang']; ?></td>
                <td><?php echo $data['real_pulang']; ?></td>
                <td><?php echo $data['status_pulang']; ?></td>
                <td><?php echo $data['jam_breafing']; ?></td>
                <td><?php echo $data['real_breafing']; ?></td>
                <td><?php echo $data['status_breafing']; ?></td>
              </tr>

            <?php }  ?>

          </tbody>
      
        </table>
    </div>
<?php } ?>




<?php
if ($_POST['cetak']=='Cetak Pdf')
{
 ?><script type="text/javascript">window.print()
    
   </script>

   <?php
} else
if ($_POST['cetak']=='Cetak Excel')
{
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename='cuba'.xls");  
}

?>