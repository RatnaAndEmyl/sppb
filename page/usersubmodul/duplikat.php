 <?php
    $kode_user = $_GET['kode_user'];
    $tgl_create = $_GET['tgl_create'];

    $sql = $koneksi_master->query("select * from db_role.tb_user  where kode_user='$kode_user'");


    $tampil = $sql->fetch_assoc();


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




    ?>

 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">>Duplikat Sub-Modul</h4>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-12 col-xs-12">
                                 <form method="POST" action="?page=usersubmodul&aksi=tambah_duplikat_proses" enctype="multipart/form-data">
                                     <div class="form-group">

                                         <input type="text" class="form-control" id="kode_user" name="kode_user" value="<?php echo $tampil['kode_user']; ?>" hidden>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputEmail111">User</label>
                                         <input type="text" class="form-control" value="<?php echo $tampil['nama']; ?>" readonly>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Level</label>
                                         <input type="text" class="form-control" value="<?php echo $tampil['level']; ?>" readonly>
                                     </div>





                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Jenis Duplikat</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="jenis_duplikat" id="jenis_duplikat" required>
                                                 <option value="">-- Pilih Jenis Duplikat --</option>
                                                 <option value="Kosongkan">Kosongkan Menu <?php echo $tampil['nama']; ?></option>
                                                 <option value="Ambil">Ambil Menu Yang Tidak Ada</option>
                                             </select>
                                         </div>
                                     </div>









                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Departemen</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="kode_departemen" id="kode_departemen" required>
                                                 <option value="">-- Pilih Departemen --</option>

                                                 <!-- looping data Subdepartement -->
                                                 <?php
                                                    $sql = $koneksi_master->query("select * from db_master.tb_departemen");
                                                    while ($datadepartemen = $sql->fetch_assoc()) {

                                                    ?>
                                                     <option value="<?php echo $datadepartemen["kode_departemen"] ?>"><?php echo $datadepartemen["nama"] ?></option>

                                                 <?php
                                                    }
                                                    ?>
                                             </select>
                                         </div>
                                     </div>



                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Sub-Departemen</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="kode_subdepartemen" id="kode_subdepartemen" required>
                                             </select>
                                         </div>
                                     </div>



                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Referensi User</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="referensi_user" id="referensi_user" required>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group">

                                         <input type="text" class="form-control" id="level" name="level" value="<?php echo $tampil['level']; ?>" hidden>
                                     </div>

                                     <div class="table-responsive" id="table-responsive">

                                     </div>
















                                     <div class="form-group">
                                         <input type="date" class="form-control" name="tgl_create" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="create_by" value="<?php echo $kodeuser; ?>" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="date" class="form-control" name="tgl_update" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="update_by" hidden>
                                     </div>

                                     <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                     <a href="?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user . $angka); ?>" class="btn btn-dark">Kembali</a>

                             </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
 </section>>

 <script>
     $("#kode_departemen").change(function() {

         // variabel dari nilai combo box Subdepartement
         var kode_departemen = $("#kode_departemen").val();

         // tampilkan image load

         // mengirim dan mengambil data
         $.ajax({
             type: "POST",
             dataType: "html",
             url: "dist/ajax/carisubdepartemen.php",
             data: "subdepartemen=" + kode_departemen,
             success: function(msg) {

                 // jika tidak ada data
                 if (msg == '') {
                     alert('Tidak ada data Kota');
                 }

                 // jika dapat mengambil data,, tampilkan di combo box kota
                 else {
                     $("#kode_subdepartemen").html(msg);
                 }

                 // hilangkan image load
                 $("#imgLoad").hide();
             }
         });
     });
 </script>

 <script>
     $("#kode_subdepartemen").change(function() {

         // variabel dari nilai combo box Subdepartement
         var kode_subdepartemen = $("#kode_subdepartemen").val();
         var kode_user = $("#kode_user").val();
         var level = $("#level").val();

         // tampilkan image load

         // mengirim dan mengambil data
         $.ajax({
             type: "POST",
             dataType: "html",
             url: "dist/ajax/carireferensi.php",
             data: "referensi=" + kode_subdepartemen + "&kode_user=" + kode_user + "&level=" + level,
             success: function(msg) {

                 // jika tidak ada data
                 if (msg == '') {
                     alert('Tidak ada data Kota');
                 }

                 // jika dapat mengambil data,, tampilkan di combo box kota
                 else {
                     $("#referensi_user").html(msg);
                 }

                 // hilangkan image load
                 $("#imgLoad").hide();
             }
         });
     });
 </script>

 <script>
     $("#referensi_user").change(function() {

         // variabel dari nilai combo box Subdepartement
         var referensi_user = $("#referensi_user").val();
         var jenis_duplikat = $("#jenis_duplikat").val();
         var kode_user = $("#kode_user").val();
         // tampilkan image load

         // mengirim dan mengambil data
         $.ajax({
             type: "POST",
             dataType: "html",
             url: "dist/ajax/cariusersubmodul.php",
             data: "referensi_user=" + referensi_user + "&jenis_duplikat=" + jenis_duplikat + "&kode_user=" + kode_user,
             success: function(msg) {

                 // jika tidak ada data
                 if (msg == '') {
                     alert('Tidak ada data Kota');
                 }

                 // jika dapat mengambil data,, tampilkan di combo box kota
                 else {
                     $("#table-responsive").html(msg);
                 }

                 // hilangkan image load
                 $("#imgLoad").hide();
             }
         });
     });
 </script>

 <script>
     $("#jenis_duplikat").change(function() {

         // variabel dari nilai combo box Subdepartement
         var referensi_user = $("#referensi_user").val();
         var jenis_duplikat = $("#jenis_duplikat").val();
         var kode_user = $("#kode_user").val();
         // tampilkan image load

         // mengirim dan mengambil data
         $.ajax({
             type: "POST",
             dataType: "html",
             url: "dist/ajax/cariusersubmodul.php",
             data: "referensi_user=" + referensi_user + "&jenis_duplikat=" + jenis_duplikat + "&kode_user=" + kode_user,
             success: function(msg) {

                 // jika tidak ada data
                 if (msg == '') {
                     alert('Tidak ada data Kota');
                 }

                 // jika dapat mengambil data,, tampilkan di combo box kota
                 else {
                     $("#table-responsive").html(msg);
                 }

                 // hilangkan image load
                 $("#imgLoad").hide();
             }
         });
     });
 </script>