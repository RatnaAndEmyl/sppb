 <?php
    $kode_user = $_GET['kode_user'];
    $tgl_create = $_GET['tgl_create'];


    $pc = $_GET['pc'];
    $oc = $_GET['oc'];
    if (md5($kode_user . $pc) <> $oc) {
    ?>
     <script type="text/javascript">
         alert("Tidak dapat mengubah data")
         window.location.href = "logout.php";
     </script>
 <?php
    }


    $angka = date('Ymdhis');



    $sql = $koneksi_master->query("select * from pb_role.tb_user  where kode_user='$kode_user'");


    $tampil = $sql->fetch_assoc();

    ?>


 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail User | <?php echo $tampil['kode_user']; ?> | <?php echo $tampil['nama']; ?></h4>
                     </div>
                     <div class="card-body">


                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Username :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"> <?php echo $tampil['username']; ?> </p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Nama :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"><?php echo $tampil['nama']; ?></p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail User Sub-Modul | <?php echo $tampil['kode_user']; ?> | <?php echo $tampil['nama']; ?></h4>
                     </div>
                     <div class="card-body">



                         <a href="?page=usersubmodul&aksi=tambah&kode_user=<?php echo $tampil['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_user'] . $angka); ?>" class="btn btn-info"> Tambah Sub-Modul </a>

                         <a href="?page=usersubmodul&aksi=duplikat&kode_user=<?php echo $tampil['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_user'] . $angka); ?>" class="btn btn-info"> Duplikat Sub-Modul </a>
                         <a href="?page=usersubmodul" class="btn btn-dark"> Kembali</a>

                         <div class="table-responsive">
                             <table id="example1" class="table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">Sub-Modul</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">tampil</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">tambah</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">ubah</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">hapus</th>
                                         <th scope="col" style="text-align:center; vertical-align:middle;">AKSI</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;


                                        $sql = $koneksi_master->query("select * from pb_role.tb_user_submodul a join pb_role.tb_submodul b on a.kode_submodul=b.kode_submodul  where a.kode_user='$kode_user' order by a.tgl_create desc");
                                        while ($data = $sql->fetch_assoc()) {

                                            $kode_user = $data['kode_user'];

                                        ?>
                                         <tr>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_submodul']; ?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['tampil']; ?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['tambah']; ?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['ubah']; ?></td>
                                             <td style="text-align:center; vertical-align:middle;"><?php echo $data['hapus']; ?></td>


                                             <td style="text-align:center; vertical-align:middle;">
                                                 <a href="?page=usersubmodul&aksi=ubah&kode_user=<?php echo $data['kode_user']; ?>&kode_submodul=<?php echo $data['kode_submodul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_user'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>

                                                 <a onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Soal Ini ?')" href="?page=usersubmodul&aksi=hapus&kode_user=<?php echo $data['kode_user']; ?>&kode_submodul=<?php echo $data['kode_submodul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_user'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                             </td>
                                         </tr>
                                     <?php }  ?>
                                 </tbody>
                                 <tfoot>
                                     <th>No.</th>
                                     <th>Sub-Modul</th>
                                     <th>tampil</th>
                                     <th>tambah</th>
                                     <th>ubah</th>
                                     <th>hapus</th>
                                     <th>AKSI</th>
                                 </tfoot>
                             </table>
                         </div>
                     </div>









































                 </div>
                 </form>
             </div>
         </div>
     </div>