<?php
$angka = date('Ymdhis');

?>

<section on class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Aktiva</h4>
                    </div>
                    <div class="card-body">
                        <a href="?page=aktiva&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table id="zero_config">
                                <table class="table table-striped table-bordered datatable-select-inputs">
                                    <table id="example1" class="table table-bordered table-hover">
                                    <!--  -->
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">KATEGORI</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">SUB KATEGORI</th>
                                                <th scope="col" style="text-align:center; vertical-align:middle;">DESKRIPSI</th>
                                               
                                                <?php
                                                // untuk memanggil trxtype pada aktiva detail yang mana itu di kelompokkan berdasarkan deskripsi pada trxtype
                                                    $sql_detail = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva a inner join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva inner join pb_master.tb_trxtype c on b.kode_trxtype=c.kode_trxtype where a.status='A' and b.status='A' and c.status='A' and c.flag_ceklis='Y' group by c.deskripsi order by b.kode_trxtype");
                                                    while ($data_detail = $sql_detail->fetch_assoc()) {
                                                        // $flag_ceklis = '-';
                                                        if ($data_detail['flag_ceklis'] == 'Y') { ?>
                                                            <th scope="col" style="text-align:center; vertical-align:middle;"><?php echo $data_detail ['deskripsi']; ?> </th>

                                                        <?php } 

                                                    }
                                                ?>
                                               <th scope="col" style="text-align:center; vertical-align:middle;">AKSI</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;

                                            $sql = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva a
                                            INNER JOIN pb_master.tb_kategori b ON a.kode_kategori=b.kode_kategori
                                            INNER JOIN pb_master.tb_subkategori c ON a.kode_subkategori=c.kode_subkategori 
                                            where a.status='A' ORDER BY a.kode_aktiva asc");
                                            while ($data = $sql->fetch_assoc()) {
                                                // $sql_cari_plat = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail where kode_aktiva='" . $data['kode_aktiva'] . "' and kode_trxtype='TRX000004' and status='A'");
                                                // $tampil_cari_plat = $sql_cari_plat->fetch_assoc();

                                                
                                            ?>
                                                <tr>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $no++; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi_kategori']; ?></td>
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi_subkategori']; ?></td>

                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <?php echo $data['deskripsi_aktiva']; ?></td>


                                                    <?php
                                                    // untuk memanggil deskripsi_aktiva pada aktiva detail yang mana itu di kelompokkan berdasarkan kode_aktiva dan kode_trxtype
                                                    $sql_detail = $koneksi_master->query("SELECT * FROM pb_transaksi.tb_aktiva a inner join pb_transaksi.tb_aktiva_detail b on a.kode_aktiva=b.kode_aktiva inner join pb_master.tb_trxtype c on b.kode_trxtype=c.kode_trxtype where a.status='A' and b.status='A' and c.status='A' and c.flag_ceklis='Y' and a.kode_aktiva = '$data[kode_aktiva]' order by b.kode_trxtype");
                                                    while ($data_detail = $sql_detail->fetch_assoc()) {
                                                        // $flag_ceklis = '-';
                                                        // $coba = $koneksi_master->query("SELECT COUNT(kode_trxtype) 'jumlah', COUNT(kode_aktiva) 'jumlah_aktiva' FROM pb_transaksi.tb_aktiva_detail WHERE kode_aktiva = '$data[kode_aktiva]' AND status = 'A'");
                                                        // $tampil_coba = $coba->fetch_assoc();

                                                        if ($data_detail['flag_ceklis'] == 'Y') { ?>
                                                        <td scope="col" style="text-align:center; vertical-align:middle;">

                                                            <!-- <?php if ($data_detail ['kode_trxtype'] < $tampil_coba['jumlah']) {?>
                                                                <?php echo '-'; ?>
                                                            <?php } ?> -->
                                                        
                                                        <?php echo $data_detail ['deskripsi_aktiva']; ?> 
                                                        </td>

                                                        <?php } 
                                                    }
                                                ?>                                                
                                                    <td style="text-align:center; vertical-align:middle;">
                                                        <a href="?page=aktiva&aksi=detail&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>" class="btn btn-success "><i class="fas fa-eye"></i></a>
                                                        <a href="?page=aktiva&aksi=ubah&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                                        <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=aktiva&aksi=hapus&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php }  ?>
                                        </tbody>
                                        <!--  -->
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