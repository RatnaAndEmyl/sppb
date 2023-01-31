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
                        <a href="?page=mapping&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Deskripsi</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_master 
                                            INNER JOIN pb_master.tb_subkategori ON pb_master.tb_mapping_master.kode_subkategori = pb_master.tb_subkategori.kode_subkategori
                                            where pb_master.tb_mapping_master.status='A' ORDER BY kode_mapping asc");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_mapping']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi_subkategori']; ?></td>
                                                    

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=mapping&aksi=detail&kode_mapping=<?php echo $data['kode_mapping']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping'] . $angka); ?>" class="btn btn-success "><i class="fas fa-eye"></i></a>
                                                        <a href="?page=mapping&aksi=ubah&kode_mapping=<?php echo $data['kode_mapping']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=mapping&aksi=hapus&kode_mapping=<?php echo $data['kode_mapping']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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