<?php
$angka = date('Ymdhis');
$kode_mapping_usergudang = $_GET['kode_mapping_usergudang'];
// echo $kode_mapping_usergudang;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping_usergudang . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_usergudang a
inner join pb_master.tb_gudang b on a.kode_gudang = b.kode_gudang
WHERE a.STATUS='A' AND kode_mapping_usergudang='$kode_mapping_usergudang' ORDER BY a.kode_mapping_usergudang asc");
$tampil = $sql->fetch_assoc();

// $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_mapping_usergudang) 'jumlah' FROM pb_master.tb_mapping_usergudang_master_detail WHERE status='A' AND kode_mapping_usergudang='$kode_mapping_usergudang'");
// $tampil_count_status = $sql_count_status->fetch_assoc();

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail Mapping Usergudang | <?php echo $tampil['kode_mapping_usergudang']; ?> 
                         | <?php echo $tampil['nama_gudang']; ?></h4>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Kode :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"> <?php echo $tampil['kode_mapping_usergudang']; ?> </p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Gudang :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"><?php echo $tampil['nama_gudang']; ?></p>
                                     </div>
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                 </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar Mapping User Gudang
                            | <?php echo $tampil['kode_mapping_usergudang']; ?> 
                            | <?php echo $tampil['nama_gudang']; ?>

                        </h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=mapping_usergudang" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>
                        <a href="?page=mapping_usergudang&aksi=tambah_usergudang_detail&kode_mapping_usergudang=<?php echo $tampil['kode_mapping_usergudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_mapping_usergudang'].$angka); ?>" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah </a>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Pengguna</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_usergudang_detail a INNER JOIN pb_role.tb_user b ON a.kode_user=b.kode_user WHERE a.STATUS='A' and b.status='A' AND kode_mapping_usergudang='$kode_mapping_usergudang' ORDER BY kode_mapping_usergudang asc");
                                            while ($data = $sql->fetch_assoc()) {


                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_mapping_usergudang']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['nik']; ?> <br>
                                                        <b><?php echo $data['nama']; ?></b>
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                                                                            
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=mapping_usergudang&aksi=hapus_user&kode_mapping_usergudang=<?php echo $data['kode_mapping_usergudang']; ?>&kode_user=<?php echo $data['kode_user']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping_usergudang'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        
                                    </table>
                                </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>window.print()</script> -->