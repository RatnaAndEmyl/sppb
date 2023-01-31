<?php

$kode_analisa_jabatan = $_GET['kode_analisa_jabatan'];
$kode_subdepartemen = $_GET['kode_subdepartemen'];
$kode_departemen = $_GET['kode_departemen']; //untuk enkripsi di link agar user tidak bisa mengubah linknya
$angka = date('Ymdhis');

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_analisa_jabatan . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
        window.location.href = "logout.php";
    </script>
<?php
}



$sql = $koneksi_master->query("select * from hr_master.tb_analisa_jabatan where kode_analisa_jabatan='$kode_analisa_jabatan'");

$tampil = $sql->fetch_assoc();

$kode_jabatan = $tampil['kode_jabatan'];
$kode_golongan = $tampil['kode_golongan'];
//echo $kode_golongan_var;
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Ubah Analisa Jabatan</h4>
              </div>
              <div class="card-body">
               
               
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <form method="POST" action="?page=analisajabatan&aksi=ubah_proses">


                    <input type="text" class="form-control" name="kode_analisa_jabatan" value="<?php echo $tampil['kode_analisa_jabatan']; ?>" hidden >

  
                    <input type="text" class="form-control" name="kode_subdepartemen" value="<?php echo $tampil['kode_subdepartemen']; ?>" hidden >


  
                    <input type="text" class="form-control" name="kode_departemen" value="<?php echo $tampil['kode_departemen']; ?>" hidden >

                <div class="form-group">
                                        <label for="exampleInputPassword1">Golongan</label>

                    <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                                        <select class="custom-select col-12" id="kode_golongan" name="kode_golongan">
                            <?php
                            $sql = $koneksi_master->query("select * from hr_master.tb_golongan where status='a' and kode_mitrakerja='$kode_mitrakerja' and kode_golongan not in (select kode_golongan from hr_master.tb_analisa_jabatan where kode_jabatan='$kode_jabatan' and kode_subdepartemen='$kode_subdepartemen' and kode_departemen='$kode_departemen' and kode_golongan<>'$kode_golongan' and status='A') order by kode_golongan");
                            while ($data = $sql->fetch_assoc()) {
                                if ($data['kode_golongan']==$tampil['kode_golongan']) {
                                echo "<option value ='$data[kode_golongan]' selected >$data[jenis_golongan] | $data[gaji_awal] | $data[gaji_akhir]</option>";    
                            } else
                            { echo "<option value ='$data[kode_golongan]'>$data[jenis_golongan] | $data[gaji_awal] | $data[gaji_akhir]</option>";    
                            }
                            
                                
                            }

                            ?>
                            </select>
                            </div>
                        </div>
                <div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                    <a href="?page=analisajabatan&aksi=analisajabatan&kode_subdepartemen=<?php echo $kode_subdepartemen; ?>&kode_departemen=<?php echo $kode_departemen; ?>&pc=<?php echo $angka; ?>&oc=<?php echo md5($kode_subdepartemen . $angka); ?>" class="btn btn-dark">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    

              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
