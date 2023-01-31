
<?php



$angka=date('Ymdhis');



// $sql = $koneksi_master->query("select * from hr_master.tb_analisa_jabatan a join hr_master.tb_subdepartemen b on a.kode_subdepartemen=b.kode_subdepartemen where a.kode_subdepartemen='$kode_subdepartemen'");


// $tampil = $sql->fetch_assoc();
$angka = date('Ymdhis');

?>



<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Daftar Analisa Jabatan</b></h4>
        </div>
        <div class="card-body">



            <div class="table-responsive">
                <br>
                <table id="example1" class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Departemen</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Subdepartemen</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Golongan</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Bagian</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Kode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $sql = $koneksi_master->query("select a.kode_analisa_jabatan, b.jabatan, c.nama, d.deskripsi, e.jenis_golongan  from hr_master.tb_analisa_jabatan a join hr_master.tb_jabatan b on a.kode_jabatan=b.kode_jabatan join hr_master.tb_departemen c on a.kode_departemen=c.kode_departemen join hr_master.tb_subdepartemen d on a.kode_subdepartemen=d.kode_subdepartemen join hr_master.tb_golongan e on a.kode_golongan=e.kode_golongan

                            where a.status='A' order by a.kode_departemen asc, e.jenis_golongan asc");
                        while ($data = $sql->fetch_assoc()) {



                            ?>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>

                          


                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['jabatan']; ?></td>

                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama']; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['deskripsi']; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['jenis_golongan']; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['jabatan']; ?> <?php echo $data['deskripsi']; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_analisa_jabatan']; ?></td>

                              
                            </tr>
                        <?php }  ?>
                    </tbody>

                </table>
            </div>
        </div>


    </div>
</div>
</div>
</div>
</section>
