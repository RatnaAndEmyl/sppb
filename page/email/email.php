<?php
$angka = date('Ymdhis');
?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Email</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=email&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KODE</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Penguna</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">email</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi
                                                </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * from pb_master.tb_email where status='A' ORDER BY kode_email asc");
                                            while ($data = $sql->fetch_assoc()) {

                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['kode_email']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['pengguna']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['email']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=email&aksi=ubah&kode_email=<?php echo $data['kode_email']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_email'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=email&aksi=hapus&kode_email=<?php echo $data['kode_email']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_email'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                       

					
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