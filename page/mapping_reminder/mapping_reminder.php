<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Mapping</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=mapping_reminder&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Masa Aktif</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_reminder 
                                            INNER JOIN pb_master.tb_trxtype ON pb_master.tb_mapping_reminder.kode_trxtype = pb_master.tb_trxtype.kode_trxtype
                                            where pb_master.tb_mapping_reminder.status='A' ORDER BY kode_mapping_reminder asc");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_mapping_reminder']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['masa_aktif']; ?>
                                                    <?php echo $data['jenis_masa_aktif']; ?>
                                                       
                                                    </td>
                                                    

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=mapping_reminder&aksi=hapus&kode_mapping_reminder=<?php echo $data['kode_mapping_reminder']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping_reminder'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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