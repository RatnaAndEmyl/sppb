<?php
$angka = date('Ymdhis');
$kode_mapping = $_GET['kode_mapping'];
// echo $kode_mapping;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_master 
inner join pb_master.tb_subkategori on pb_master.tb_mapping_master.kode_subkategori = pb_master.tb_subkategori.kode_subkategori
WHERE pb_master.tb_mapping_master.STATUS='A' AND kode_mapping='$kode_mapping' ORDER BY kode_mapping asc");
$tampil = $sql->fetch_assoc();

// $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_mapping) 'jumlah' FROM pb_master.tb_mapping_master_detail WHERE status='A' AND kode_mapping='$kode_mapping'");
// $tampil_count_status = $sql_count_status->fetch_assoc();

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail Mapping | <?php echo $tampil['kode_mapping']; ?> 
                         | <?php echo $tampil['deskripsi_subkategori']; ?></h4>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Kode :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"> <?php echo $tampil['kode_mapping']; ?> </p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Sub Kategori :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"><?php echo $tampil['deskripsi_subkategori']; ?></p>
                                     </div>
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                 </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar mapping
                            | <?php echo $tampil['kode_mapping']; ?> 
                            | <?php echo $tampil['deskripsi_subkategori']; ?>

                        </h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=mapping" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>
                        <a href="?page=mapping&aksi=tambah_detail&kode_mapping=<?php echo $tampil['kode_mapping']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_mapping'].$angka); ?>" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah </a>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Trxtype</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_detail a INNER JOIN pb_master.tb_trxtype b ON a.kode_trxtype=b.kode_trxtype WHERE a.STATUS='A' and b.status='A' AND kode_mapping='$kode_mapping' ORDER BY kode_mapping asc");
                                            while ($data = $sql->fetch_assoc()) {


                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;"> -->
                                                        <!-- <?php echo $data['kode_mapping']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?> 
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                                                                            
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=mapping&aksi=hapus_trxtype&kode_mapping=<?php echo $data['kode_mapping']; ?>&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true"></i></a>
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