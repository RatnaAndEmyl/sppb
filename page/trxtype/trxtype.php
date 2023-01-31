<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar TRXTYPE</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=trxtype&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <!-- <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th> -->
                                                <th scope="col" style="text-align:center; vertical-align:middle;">trxtype</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">flag</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * from pb_master.tb_trxtype where status='A' ORDER BY kode_trxtype asc");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <!-- <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_trxtype']; ?></td> -->
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['flag_inputan']; ?></td>
                                                    

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=subtrxtype&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-success "><i class="fas fa-eye"></i></a>
                                                        <a href="?page=trxtype&aksi=ubah&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=trxtype&aksi=hapus&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                       

					
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