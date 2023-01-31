 <?php
    $kode_user = $_GET['kode_user'];
    $tgl_create = $_GET['tgl_create'];

    $sql = $koneksi_master->query("select * from pb_role.tb_user where kode_user='$kode_user'");


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
                         <h4 class="card-title">Tambah Sub-Modul</h4>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-sm-12 col-xs-12">
                                 <form method="POST" action="?page=usersubmodul&aksi=tambah_proses"
                                     enctype="multipart/form-data">
                                     <div class="form-group">

                                         <input type="text" class="form-control" id="kode_user" name="kode_user"
                                             value="<?php echo $tampil['kode_user']; ?>" hidden>
                                     </div>

                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Modul</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i
                                                         class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="kode_modul" id="kode_modul" required>
                                                 <option value="">-- Pilih Modul --</option>

                                                 <!-- looping data Subdepartement -->
                                                 <?php
                                                    $sql = $koneksi_master->query("select * from  pb_role.tb_modul where status='A'  and kode_modul in (select distinct kode_modul from pb_role.tb_submodul where status='A')");
                                                    while ($datasubd = $sql->fetch_assoc()) {

                                                    ?>
                                                 <option value="<?php echo $datasubd["kode_modul"] ?>">
                                                     <?php echo $datasubd["nama_modul"] ?></option>

                                                 <?php
                                                    }
                                                    ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <label for="exampleInputEmail111">Sub-Modul</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text" id="basic-addon1"><i
                                                         class="fas fa-pencil-alt"></i></span>
                                             </div>
                                             <select class="form-control" name="kode_submodul" id="kode_submodul"
                                                 required>
                                             </select>
                                         </div>
                                     </div>

                                     <label for="exampleInputEmail111">View</label>
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="view" value="Y"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="view" value="N"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                             </div>
                                         </div>
                                     </div>

                                     <label for="exampleInputEmail111">Insert</label>
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="insert" value="Y"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="insert" value="N"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                             </div>
                                         </div>
                                     </div>

                                     <label for="exampleInputEmail111">Update</label>
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="update" value="Y"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="update" value="N"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                             </div>
                                         </div>
                                     </div>

                                     <label for="exampleInputEmail111">Delete</label>
                                     <div class="card">
                                         <div class="card-body">
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="delete" value="Y"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio1">Beri Akses</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="delete" value="N"
                                                     required>
                                                 <label class="form-check-label" for="inlineRadio2">Tidak Perlu</label>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <input type="text" class="form-control" name="server" id="server"
                                             value="<?php echo $server; ?>" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="date" class="form-control" name="tgl_create" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="create_by"
                                             value="<?php echo $kodeuser; ?>" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="date" class="form-control" name="tgl_update" hidden>
                                     </div>
                                     <div class="form-group">
                                         <input type="text" class="form-control" name="update_by" hidden>
                                     </div>

                                     <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                     <a href="?page=usersubmodul&aksi=detail&kode_user=<?php echo $kode_user; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_user . $angka); ?>"
                                         class="btn btn-dark">Kembali</a>

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