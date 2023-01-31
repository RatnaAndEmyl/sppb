
 <?php
 $kode_subdepartemen        = $_GET['kode_subdepartemen'];
 $kode_departemen        = $_GET['kode_departemen'];



$pc = $_GET ['pc'];
$oc = $_GET ['oc'];
if (md5($kode_subdepartemen.$pc)<>$oc) {
           ?>
        <script type="text/javascript">
            
            alert ("Tidak dapat mengubah data")
            window.location.href = "logout.php";

        </script>
        <?php 
}


$sql = $koneksi_master->query("select * from hr_master.tb_analisa_jabatan a join hr_master.tb_subdepartemen b on a.kode_subdepartemen=b.kode_subdepartemen where a.kode_subdepartemen='$kode_subdepartemen'");


$tampil = $sql->fetch_assoc();
                               

    $angka = date('Ymdhis');

?>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Tambah Analisa Jabatan <b><?php echo $tampil['deskripsi'];?></b></h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form method="POST" action="?page=analisajabatan&aksi=tambah_proses" enctype="multipart/form-data">



                                               <input type="text" class="form-control" name="kode_subdepartemen" id="kode_subdepartemen" value="<?php echo $kode_subdepartemen; ?>" hidden  >


  
                    <input type="text" class="form-control" name="kode_departemen" id="kode_departemen" value="<?php echo $kode_departemen; ?>" hidden  >
  
                    <input type="text" class="form-control" name="kode_mitrakerja" id="kode_mitrakerja" value="<?php echo $kode_mitrakerja; ?>" hidden  >


                           <!--   <div class="form-group">
                                <label for="exampleInputEmail111">Jabatan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <select class="form-control" name="kode_jabatan" id="kode_jabatan" >
                                             <option value=''>-- Pilih Jabatan --</option>
                                       
                                    </select>
                                </div>
                            </div> -->


                          <div class="form-group">
                                <label for="exampleInputEmail111">Jabatan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <select class="form-control" name="kode_jabatan" id="kode_jabatan" >
                                        <?php

                                        echo "<option value=''>-- Pilih Jabatan --</option>";
                                        $sql1 = $koneksi_master->query("select * from hr_master.tb_jabatan where status='A' and kode_mitrakerja='$kode_mitrakerja'  order by jabatan");
                                        while ($datacek = $sql1->fetch_assoc()) {
                                            echo "<option value ='$datacek[kode_jabatan]'>$datacek[jabatan]</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>

<!-- "select * from hr_master.tb_jabatan where status='A' and kode_jabatan not in (select kode_jabatan from hr_master.tb_analisa_jabatan where status='A' and kode_subdepartemen='".$_POST["kode_subdepartemen"]."') " -->







                      <div class="table-responsive" id="carigolongan"></div>
                            








                            <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                            <a href="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>" class="btn btn-dark">Kembali</a>

                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>

</div>
</div>
</section>
