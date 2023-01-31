<?php
$angka = date('Ymdhis');
$kode_aktiva = $_GET['kode_aktiva'];
// echo $kode_aktiva;

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_aktiva.$pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}

$sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva 
inner join pb_master.tb_kategori on pb_transaksi.tb_aktiva.kode_kategori=pb_master.tb_kategori.kode_kategori 
inner join pb_master.tb_subkategori on pb_transaksi.tb_aktiva.kode_subkategori=pb_master.tb_subkategori.kode_subkategori 
WHERE pb_transaksi.tb_aktiva.status='A' AND kode_aktiva='$kode_aktiva' ORDER BY kode_aktiva asc");
$tampil = $sql->fetch_assoc();

// $sql_count_status = $koneksi_master->query("SELECT COUNT(kode_aktiva) 'jumlah' FROM pb_master.tb_aktiva_detail WHERE status='A' AND kode_aktiva='$kode_aktiva'");
// $tampil_count_status = $sql_count_status->fetch_assoc();
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set('Asia/Makassar'); //Menyesuaikan waktu dengan tempat kita tinggal

?>
<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                     <div class="card-header">
                         <h4 class="card-title">Detail Aktiva | <?php echo $tampil['kode_aktiva']; ?> 
                         | <?php echo $tampil['deskripsi_kategori']; ?> |
                            <?php echo $tampil['deskripsi_subkategori']; ?> |<?php echo $tampil['deskripsi_aktiva']; ?></h4>
                     </div>
                     <div class="card-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Kategori :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"> <?php echo $tampil['deskripsi_kategori']; ?> </p>
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
                             <div class="col-md-6">
                                 <div class="form-group row">
                                     <label class="control-label text-right col-md-3">Deskripsi :</label>
                                     <div class="col-md-9">
                                         <p class="form-control-static"><?php echo $tampil['deskripsi_aktiva']; ?></p>
                                     </div>
                                 </div>
                             </div>
                             <br>
                             
                         </div>
                     </div>
                 </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar aktiva |
                            <?php echo $tampil['kode_aktiva']; ?> |
                            <?php echo $tampil['deskripsi_kategori']; ?> |
                            <?php echo $tampil['deskripsi_subkategori']; ?> |
                            <?php echo $tampil['deskripsi_aktiva']; ?> 
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- <a href="?page=aktiva&aksi=simpan_detail&kode_aktiva=<?php echo $tampil['kode_aktiva']; ?>&kode_trxtype=<?php echo $tampil['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_aktiva'].$angka); ?>" class="btn btn-success" style="margin-bottom: 5px; "><i class="fa fa-arrow-circle-down"></i> Simpan</a> -->
                        <a href="?page=home&halaman=1" class="btn btn-success" style="margin-bottom: 5px; "><i
                            class="fa fa-arrow-circle-down"></i> Simpan</a>

                        <a href="?page=aktiva&aksi=tambah_detail&kode_aktiva=<?php echo $tampil['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($tampil['kode_aktiva'].$angka); ?>" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah </a>
                        
                        <!-- <br>
                        <label style= "color: red ">*Silahkan Isi Data Perizinan Dengan Lengkap</label> -->

                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Out</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Data</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva_detail a INNER JOIN pb_master.tb_trxtype b ON a.kode_trxtype=b.kode_trxtype WHERE a.STATUS='A' AND kode_aktiva='$kode_aktiva' ORDER BY kode_aktiva asc");
                                            while ($data = $sql->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                    <?php if ($data['flag_ceklis'] == 'Y') { ?>
                                                
                                                    <a href="?page=aktiva&aksi=in&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>"class="btn btn-warning btn-md"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                                        <!-- untuk button kedalam -->
                                                        
                                                    <?php } else  { ?>
                                                        <a href="?page=aktiva&aksi=out&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>"class="btn btn-dark btn-md"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                                                                                                                                                                    <!-- untuk button ke luar-->

                                                <?php   } ?>
                                                    
                                                </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?> 
                                                    </td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                    
                                                    <?php if ($data['tgl_jatuh_tempo']<>null) { ?>
                                                        <?php echo strftime("%A, %d %B %Y", strtotime($data['tgl_jatuh_tempo'])); ?><br> 
                                                    <?php }?>
                                                    
                                                    <?php if ($data['periode_awal']<>null) { ?>
                                                        <?php echo strftime("%B %Y", strtotime($data['periode_awal'])); ?> -  
                                                        <?php echo strftime("%B %Y", strtotime($data['periode_akhir']));?><br> 
                                                    <?php } ?>
                                                        <?php echo $data['deskripsi_aktiva']; ?> 
                                                    </td>
                                                    
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=aktiva&aksi=hapus_trxtype&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>" class="btn btn-danger btn-md" style="margin-bottom: 5px; "><i class="fas fa-trash" aria-hidden="true"></i></a>
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