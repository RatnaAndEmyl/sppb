 <?php
 $kode_departemen        = $_GET['kode_departemen'];



 $pc = $_GET ['pc'];
 $oc = $_GET ['oc'];
 if (md5($kode_departemen.$pc)<>$oc) {
     ?>
     <script type="text/javascript">

        alert ("Tidak dapat mengubah data")
        window.location.href = "logout.php";

    </script>
    <?php 
}


$angka=date('Ymdhis');



$sql = $koneksi_master->query("select * from hr_master.tb_departemen where kode_departemen='$kode_departemen'");


$tampil = $sql->fetch_assoc();

?>


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Detail Departemen  | <?php echo $tampil['nama'];?></h4>
        </div>
        <div class="card-body">


           <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Kode Departemen :</label>
                    <div class="col-md-9">
                        <p class="form-control-static"> <?php echo $tampil['kode_departemen'];?> </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-3">Departemen :</label>
                    <div class="col-md-9">
                        <p class="form-control-static"><?php echo $tampil['nama'];?></p>
                    </div>
                </div>
            </div>



            <!--/span-->
        </div>

    </div>
</div>
</div>

</div>
</div>
</section>




<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h4 class="card-title">Detail Sub-Departemen | <?php echo $tampil['nama'];?></h4>
        </div>
        <div class="card-body">



            <a href="?page=subdepartemen&aksi=tambah&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_departemen . $angka); ?>" class="btn btn-primary" > Tambah Sub-Departemen </a>
            <a href="?page=departemen" class="btn btn-dark"> Kembali</a><br><br>


            <div class="table-responsive">

                <table id="example1" class="table table-bordered table-hover">


                 <thead> 
                     <tr>
                       <th scope="col" style="text-align:center; vertical-align:middle;">NO</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">Sub-Departemen</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">Parent</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">Level</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">Route</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">Jumlah</th>
                       <th scope="col" style="text-align:center; vertical-align:middle;">AKSI</th>
                   </tr>
               </thead>
               <tbody>
                <?php
                $no = 1;


                $sql = $koneksi_master ->query("select a.kode_subdepartemen,a.kode_departemen,a.route,a.deskripsi 'desk',a.level 'lev_disk',c.deskripsi 'desk_parent' from hr_master.tb_subdepartemen a inner join hr_master.tb_departemen b on a.kode_departemen=b.kode_departemen join hr_master.tb_subdepartemen c on c.kode_subdepartemen=a.subdepartemen_parent where a.status='A' and a.kode_mitrakerja='$kode_mitrakerja' and b.kode_departemen='$kode_departemen' ORDER BY a.subdepartemen_parent, a.kode_departemen asc");
                while ($data=$sql->fetch_assoc()) {

                    $kode_departemen= $data['kode_departemen'];

                    $sql_cari_orang = $koneksi_master->query("SELECT count(nik) 'total' from hr_transaksi_dpk.tb_karyawan_analisa_jabatan a inner join hr_master.tb_analisa_jabatan b on a.kode_analisa_jabatan=b.kode_analisa_jabatan where  b.kode_subdepartemen='".$data['kode_subdepartemen']."' and a.status='A' and b.status='A'");


                    $tampil_cari_orang = $sql_cari_orang->fetch_assoc();



                    ?>


                    <tr>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $data['desk']; ?></td>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $data['desk_parent']; ?></td>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $data['lev_disk']; ?></td>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $data['route']; ?></td>
                     <td style="text-align:center; vertical-align:middle;"><?php echo $tampil_cari_orang['total']; ?> orang</td>



                     <td style="text-align:center; vertical-align:middle;">

                         <?php
                         $angka = date('Ymdhis');
                         ?>


                         <a href="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_subdepartemen'] . $angka); ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                         <a href="?page=subdepartemen&aksi=ubah&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_subdepartemen'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                              <?php if ($tampil_cari_orang['total']==0){?>
                         <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus data Ini ?')" href="?page=subdepartemen&aksi=hapus&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_subdepartemen'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                     <?php }?>


                     </td>
                 </tr>
             <?php }  ?>
         </tbody>
         <tfoot>
         </tfoot>
     </table>
 </div>



</div>
</div>
</div>

</div>
</div>
</section>
