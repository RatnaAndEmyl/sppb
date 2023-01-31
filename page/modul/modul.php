    <?php 
    $angka = date('Ymdhis');
    ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Daftar Modul</h4>
              </div>
              <div class="card-body">
               
               
        <a href="?page=modul&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
      
 <div class="table-responsive">
<br>
<table id="example1" class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Kode Modul</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Nama Modul</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $sql = $koneksi_master->query("select * from pb_role.tb_modul  where status='A' ORDER BY kode_modul asc");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_modul']; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['nama_modul']; ?></td>
                                



                                <td style="text-align:center; vertical-align:middle;">
                                    <a href="?page=modul&aksi=ubah&kode_modul=<?php echo $data['kode_modul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_modul'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=modul&aksi=hapus&kode_modul=<?php echo $data['kode_modul']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_modul'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                   
                </table>
        </div>
    </div>

    
              </div>
            </div>
        </div>
      </div>
    </section>
