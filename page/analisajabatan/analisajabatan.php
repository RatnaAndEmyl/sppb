
 <?php
 $kode_subdepartemen        = $_GET['kode_subdepartemen'];
 $kode_departemen        = $_GET['kode_departemen'];



$pc = $_GET ['pc'];
$oc = $_GET ['oc'];
if (md5($kode_subdepartemen.$pc)<>$oc) {
           ?>
        <script type="text/javascript">
            
            alert ("Tidak dapat mengubah data")
            window.location.href = "logout.php";    

        </script>
        <?php 
}


                                               $angka=date('Ymdhis');
                               


$sql = $koneksi_master->query("select * from hr_master.tb_analisa_jabatan a join hr_master.tb_subdepartemen b on a.kode_subdepartemen=b.kode_subdepartemen where a.kode_subdepartemen='$kode_subdepartemen'");


$tampil = $sql->fetch_assoc();
    $angka = date('Ymdhis');

?>



    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Daftar Golongan Jabatan <b><?php echo $tampil['deskripsi']?></b></h4>
              </div>
              <div class="card-body">
               
               
        <a href="?page=analisajabatan&aksi=tambah&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>" class="btn btn-primary"; "><i class="fas fa-plus-circle"></i> Tambah Data</a>
        <a href="?page=analisajabatan&aksi=historyanalisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>" class="btn btn-danger"><i class="fas fa-eye-slash"></i> History Golongan Jabatan</a>
        <a href="?page=departemen&aksi=detail&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_departemen . $angka); ?>" class="btn btn-dark">Kembali</a>
      
 <div class="table-responsive">
<br>
<table id="example1" class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th scope="col" style="text-align:center; vertical-align:middle;">No.</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Kode Golongan Jabatan</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Jabatan</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Golongan</th>
                            <th scope="col" style="text-align:center; vertical-align:middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $sql = $koneksi_master->query("select a.kode_analisa_jabatan, a.kode_jabatan, a.kode_departemen, a.kode_subdepartemen, a.kode_golongan, a.status, a.kode_mitrakerja, b.jabatan, c.nama, d.deskripsi, e.jenis_golongan from hr_master.tb_analisa_jabatan a join hr_master.tb_jabatan b on a.kode_jabatan=b.kode_jabatan join hr_master.tb_departemen c on a.kode_departemen=c.kode_departemen join hr_master.tb_subdepartemen d on a.kode_subdepartemen=d.kode_subdepartemen join hr_master.tb_golongan e on a.kode_golongan=e.kode_golongan where a.status='A' and a.kode_mitrakerja='$kode_mitrakerja' and a.kode_departemen='$kode_departemen' and a.kode_subdepartemen='$kode_subdepartemen' ORDER BY kode_analisa_jabatan asc");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <tr>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $no++; ?></td>
                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['kode_analisa_jabatan']; ?></td>


                                <?php if ( $data['kode_jabatan']=='JBT00012'){?>
                                <td style="text-align:left; vertical-align:middle;"><b><?php echo $data['jabatan']; ?></b> (<?php echo $data['nama']; ?>)</td>
                                <?php } else { ?>
                                <td style="text-align:left; vertical-align:middle;"><b><?php echo $data['jabatan']; ?></b> (<?php echo $data['deskripsi'];?>)</td>
                              <?php }?>
                              

                                <td style="text-align:center; vertical-align:middle;"><?php echo $data['jenis_golongan']; ?></td>



                                <td style="text-align:center; vertical-align:middle;">
                                    <a href="?page=karyawan&aksi=data_karyawan&kode_analisa_jabatan=<?php echo $data['kode_analisa_jabatan']; ?>&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $data['kode_departemen']; ?>&kode_jabatan=<?php echo $data['kode_jabatan']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_analisa_jabatan'] . $angka); ?>" class="btn btn-dark"><i class="fas fa-user-alt"></i></a>
                                    <a href="?page=analisajabatan&aksi=ubah&kode_analisa_jabatan=<?php echo $data['kode_analisa_jabatan']; ?>&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $data['kode_departemen']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_analisa_jabatan'] . $angka); ?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    <a onclick="return confirm('Apakah Anda Yakin untuk Menghapus Data Ini ?')" href="?page=analisajabatan&aksi=hapus&kode_analisa_jabatan=<?php echo $data['kode_analisa_jabatan']; ?>&kode_subdepartemen=<?php echo $data['kode_subdepartemen']; ?>&kode_departemen=<?php echo $data['kode_departemen']; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($data['kode_analisa_jabatan'] . $angka); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


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
