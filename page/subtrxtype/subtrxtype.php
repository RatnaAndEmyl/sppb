<?php
$angka = date('Ymdhis');
$kode_trxtype = $_GET['kode_trxtype'];
// echo $kode_trxtype;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_trxtype.$pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype WHERE pb_master.tb_trxtype.STATUS='A' AND kode_trxtype='$kode_trxtype' ORDER BY kode_trxtype asc");
$tampil = $sql->fetch_assoc();

// $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_trxtype) 'jumlah' FROM pb_master.tb_aktiva_detail WHERE status='A' AND kode_trxtype='$kode_trxtype'");
// $tampil_count_status = $sql_count_status->fetch_assoc();

?>
<!--  -->
<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail  | <?php echo $tampil['kode_trxtype']; ?> 
                         | <?php echo $tampil['deskripsi']; ?> 
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Kode Trxtype :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"> <?php echo $tampil['kode_trxtype']; ?> </p>
                                     </div>
                                 </div>
                             </div>

                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Deskripsi :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"><?php echo $tampil['deskripsi']; ?></p>
                                     </div>
                                 </div>
                             </div>
                             
                         </div>
                     </div>
                 </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar subtrxtype | 
                            <?php echo $tampil['kode_trxtype']; ?> |
                            <?php echo $tampil['deskripsi']; ?> 

                        </h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=trxtype" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a>

                        <a href="?page=subtrxtype&aksi=tambah&kode_trxtype=<?php echo $tampil['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_trxtype'].$angka); ?>" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah </a>

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Trxtype</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT a.deskripsi_subtrxtype, b.deskripsi, a.kode_trxtype, a.tgl_create FROM pb_master.tb_subtrxtype  a
                                            INNER JOIN pb_master.tb_trxtype b ON a.kode_trxtype=b.kode_trxtype 
                                            WHERE a.STATUS='A' AND b.kode_trxtype='$kode_trxtype' ORDER BY b.kode_trxtype asc");
                                            while ($data = $sql->fetch_assoc()) {


                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?> 
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi_subtrxtype']; ?> 
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                                                                            
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=subtrxtype&aksi=hapus&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&tgl_create=<?php echo $data['tgl_create']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true"></i></a>
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