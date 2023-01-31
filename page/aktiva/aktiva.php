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
            <a href="?page=jatuh_tempo&aksi=home_reminder_coba" class="btn btn-dark" style="margin-bottom: 5px; "><i
                class="fa fa-arrow-circle-left"></i> Kembali</a>
            <a href="?page=aktiva&aksi=tambah" class="btn btn-info" style="margin-bottom: 5px; "><i
                class="fas fa-plus-circle"></i> Tambah Data</a>
            
            <div class="table-responsive">
              <table id="zero_config">
                <table class="table table-striped table-bordered datatable-select-inputs">
                  <table id="example1" class="table table-bordered table-hover">
                    <!--  -->
                    <thead>
                      <tr>
                        <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">KATEGORI</th>
                        <!-- <th scope="col" style="text-align:center; vertical-align:middle;">SUB KATEGORI</th>
                        <th scope="col" style="text-align:center; vertical-align:middle;">DESKRIPSI</th> -->
                        <?php
                        $sql_custom = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype where status = 'A' and flag_ceklis = 'Y' ");
                                            
                        while ($data_custom = $sql_custom->fetch_assoc()) {
                                                  
                        ?>
                        <th scope="col" style="text-align:center; vertical-align:middle;">
                          <?php echo $data_custom ['deskripsi']; ?></th>
                        <?php
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
                        ?>
                      <tr>
                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $no++; ?></td>

                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $data['deskripsi_kategori']; ?>
                          - <?php echo $data['deskripsi_subkategori']; ?> <br>
                          (<?php echo $data['deskripsi_aktiva']; ?>)</td>


                        <?php
                        $sql_custom = $koneksi_master->query("SELECT * FROM pb_master.tb_trxtype a   where a.status = 'A' and a.flag_ceklis = 'Y'");

                        while ($data_custom = $sql_custom->fetch_assoc()) {

                        $sql_cnt = $koneksi_master->query("select count(kode_aktiva) 'jumlah' from
                        pb_transaksi.tb_aktiva_detail a 
                        where a.status = 'A' and a.kode_trxtype='".$data_custom['kode_trxtype']."' and a.kode_aktiva = '".$data['kode_aktiva']."' ");


                        $data_cnt = $sql_cnt->fetch_assoc();
                        $view='-';
                        if ($data_cnt['jumlah']>0){

                        $sql_detail = $koneksi_master->query("select * from pb_transaksi.tb_aktiva_detail a where a.status = 'A' and a.kode_trxtype='".$data_custom['kode_trxtype']."' and a.kode_aktiva = '".$data['kode_aktiva']."' ");

                        $data_detail = $sql_detail->fetch_assoc();
                        $view=$data_detail['deskripsi_aktiva'];
                         }
                        ?>

                        <td style="text-align:center; vertical-align:middle;">
                          <?php echo $view; ?></td>
                        <?php
                                                }
                                                

                                                
                                                
                                            
                                                ?>
                        <td style="text-align:center; vertical-align:middle;">
                          <a href="?page=aktiva&aksi=detail&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>"
                            class="btn btn-success "><i class="fas fa-eye"></i></a>
                          <a href="?page=aktiva&aksi=ubah&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>"
                            class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                          <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')"
                            href="?page=aktiva&aksi=hapus&kode_aktiva=<?php echo $data['kode_aktiva']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_aktiva'] . $angka); ?>"
                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
