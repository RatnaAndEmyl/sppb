<?php


$kode_mapping        = $_GET['kode_mapping'];
$kode_subkategori   = $_GET['kode_subkategori'];

$pc = $_GET['pc'];
$oc = $_GET['oc'];
if (md5($kode_mapping . $pc) <> $oc) {
?>
    <script type="text/javascript">
        alert("Tidak dapat mengubah data")
       window.location.href = "logout.php";
    </script>
<?php
}


$sql = $koneksi_master->query("SELECT * FROM pb_master.tb_mapping_master where kode_mapping='$kode_mapping'");

$tampil = $sql->fetch_assoc();
?>
<section on class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Daftar Mapping</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Ubah Mapping</h4>
                            <div class="d-flex align-items-center">
                            </div>
                        </div>
                    </div>
                    <br>
                
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form method="POST" action="?page=mapping&aksi=ubah_proses" name="autoSumForm">
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail111">Kode Mapping</label>
                                    <input type="text" class="form-control" name="kode_mapping" value="<?php echo $tampil['kode_mapping']; ?>" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                        </div>
                                        <select class="custom-select col-12" id="kode_subkategori" name="kode_subkategori">
                                            <?php
                                            $sql = $koneksi_master->query("SELECT* FROM pb_master.tb_subkategori WHERE STATUS='A' ORDER BY kode_subkategori");
                                            while ($data = $sql->fetch_assoc()) {
                                                if ($data['kode_subkategori'] == $tampil['kode_subkategori']) {
                                                    echo "<option value ='$data[kode_subkategori]' selected >$data[deskripsi_subkategori]</option>";
                                                } else {
                                                    echo "<option value ='$data[kode_subkategori]'>$data[deskripsi_subkategori]</option>";
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-success m-r-10">
                                    <a href="?page=mapping" class="btn btn-dark">Kembali</a>
                                </div>
                                
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>