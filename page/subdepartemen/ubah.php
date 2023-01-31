<?php

$kode_subdepartemen = $_GET['kode_subdepartemen'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_subdepartemen . $pc) <> $oc) {
?>
<script type="text/javascript">
alert("Tidak dapat mengubah data")
window.location.href = "logout.php";
</script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_subdepartemen_karyawan where kode_subdepartemen='$kode_subdepartemen'");

$user   = $data['kode_user'];
$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ubah Subdepartemen</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <form method="POST" action="?page=subdepartemen&aksi=ubah_proses">
                <div class="form-group">
                    <!-- <label for="exampleInputEmail111">Kode Sub-Modul</label> -->
                    <input type="text" class="form-control" name="kode_subdepartemen"
                        value="<?php echo $tampil['kode_subdepartemen']; ?>" hidden readonly>
                </div>



                <div class="form-group">
                    <label for="exampleInputPassword1">Departemen</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                        </div>
                        <select class="custom-select col-12" id="kode_departemen" name="kode_departemen">
                            <?php
                            $sql = $koneksi_master->query("select * from pb_master.tb_departemen_karyawan where status='A' order by kode_departemen");
                            while ($data = $sql->fetch_assoc()) {
                                if ($data['kode_departemen'] == $tampil['kode_departemen']) {
                                    echo "<option value ='$data[kode_departemen]' selected >$data[nama_departemen]</option>";
                                } else {
                                    echo "<option value ='$data[kode_departemen]'>$data[nama_departemen]</option>";
                                }
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail111">Nama Sub-Departemen</label>
                    <input type="text" class="form-control" name="nama_subdepartemen"
                        value="<?php echo $tampil['nama_subdepartemen']; ?>" required>
                </div>




                <div>
                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                    <a href="?page=subdepartemen" class="btn btn-dark">Kembali</a>
                </div>
                </form>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>