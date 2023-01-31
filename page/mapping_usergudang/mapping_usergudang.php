<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Mapping User Gudang</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=home" class="btn btn-dark" style="margin-bottom: 5px; "><i class="fas fa-undo"></i> Kembali</a>

                        <a href="?page=mapping_usergudang&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
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

                                            $sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_usergudang a
                                            INNER JOIN pb_master.tb_gudang b ON a.kode_gudang = b.kode_gudang
                                            where a.status='A' ORDER BY a.kode_mapping_usergudang asc");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_mapping_usergudang']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                    <?php echo $data['kode_mapping_usergudang']; ?><br>
                                                    <b><?php echo $data['nama_gudang']; ?></b></td>
                                                    

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=mapping_usergudang&aksi=detail&kode_mapping_usergudang=<?php echo $data['kode_mapping_usergudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping_usergudang'] . $angka); ?>" class="btn btn-success "><i class="fas fa-eye"></i></a>
                                                        <a href="?page=mapping_usergudang&aksi=ubah&kode_mapping_usergudang=<?php echo $data['kode_mapping_usergudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping_usergudang'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=mapping_usergudang&aksi=hapus&kode_mapping_usergudang=<?php echo $data['kode_mapping_usergudang']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_mapping_usergudang'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <tfoot>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <!-- <td></td> -->
                                        </tfoot>
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