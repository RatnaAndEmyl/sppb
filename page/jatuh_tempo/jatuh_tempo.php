<?php
$angka = date('Ymdhis');

?>
<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Jatuh Tempo</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">trxtype</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $no = 1;
                                            $sql = $koneksi_master->query("SELECT * from pb_master.tb_trxtype a where a.status='A' and exists (select x.kode_trxtype from pb_master.tb_mapping_reminder x where x.status='A' and a.kode_trxtype=x.kode_trxtype) ORDER BY a.kode_trxtype asc");
                                            while ($data = $sql->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=jatuh_tempo&aksi=detail&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-success "><i class="fas fa-eye"></i></a>
                                                        <!--fas fa-eye -->
                                                        <!-- fa fa-folder -->
                                                        <!-- fa fa-th-list -->

                                                        <a href="?page=jatuh_tempo&aksi=p_detail&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-warning "><i class="fa fa-bell"></i></a> 

                                                        <a href="?page=jatuh_tempo&aksi=duplicate&kode_trxtype=<?php echo $data['kode_trxtype']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_trxtype'] . $angka); ?>" class="btn btn-secondary"><i class="fa fa-clone"></i></a>
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